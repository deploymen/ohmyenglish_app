<?php namespace App\Http\Controllers;

use App;
use App\Libraries\ResponseHelper;
use App\Models\Article;
use Exception;
use Request;
use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;

Class ArticleController extends Controller {

	public function get() {
		try {
			$page = Request::input("page", 1);
			$perPage = Request::input("per_page", 8);
			$articles = Article::where('enable', 1)->orderBy('published_at', 'desc')->select('title', 'url_slug', 'content', 'published_at')->paginate($perPage);
			$articles->setPath('api/articles/list');
			return ResponseHelper::OutputJSON('success', '', [
				'articles' => $articles->toArray(),
			]);
		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('fail', 'exception');
		}
	}

	public function create() {

		$title = Request::input("title");
		$content = Request::input("content");
		$intro = Request::input("intro");
		$shareEN = Request::input("share_en");
		$shareBM = Request::input("share_bm");
		$publishedAt = Request::input("published_at");
		$metaTitle = Request::input("meta_title");
		$metaDescription = Request::input("meta_description");

		if (!$title || !$content || !$intro || !$shareEN || !$shareBM || !$publishedAt || !$metaTitle || !$metaDescription) {
			die('missing parameters');
		}

		$slug = str_slug($title, "-");

		$storage = new FileSystem('./assets/images/article/uploads', true);

		//validate images uploads
		try {
			$fileThumb = new File('thumb', $storage);
			$fileXsell = new File('xsell', $storage);
			$fileShare = new File('share', $storage);

			//make sure all images are upload
			if (!intval($fileThumb->getSize())) {
				die('missing image: thumb');
			}
			if (!intval($fileXsell->getSize())) {
				die('missing image: xsell');
			}
			if (!intval($fileShare->getSize())) {
				die('missing image: share');
			}

			$fileThumb->setName($slug . '.thumb');
			$fileThumb->addValidations(array(
				new Mimetype('image/jpeg'),
				new Size('1M'),
			));

			$fileXsell->setName($slug . '.xsell');
			$fileXsell->addValidations(array(
				new Mimetype('image/png'),
				new Size('1M'),
			));

			$fileShare->setName($slug . '.share');
			$fileShare->addValidations(array(
				new Mimetype('image/jpeg'),
				new Size('1M'),
			));

			$fileThumb->upload();
			$fileXsell->upload();
			$fileShare->upload();

		} catch (Exception $ex) {
			// Fail!
			/*			$errors = $fileThumb->getErrors();
			$errors = $fileXsell->getErrors();
			$errors = $fileShare->getErrors();
			return $errors;*/
			die($ex->getMessage());
		}

		$article = new Article;
		$article->title = $title;
		$article->url_slug = $slug;
		$article->content = $content;
		$article->intro = $intro;
		$article->share_en = $shareEN;
		$article->share_ms = $shareBM;
		$article->published_at = $publishedAt;
		$article->meta_title = $metaTitle;
		$article->meta_description = $metaDescription;
		$article->save();

		return redirect('/admin/articles');

	}

	public function edit($id) {

		$article = Article::find($id);
		if (!$article) {
			die("id not found");
		}

		$title = Request::input("title");
		$content = Request::input("content");
		$intro = Request::input("intro");
		$shareEN = Request::input("share_en");
		$shareBM = Request::input("share_bm");
		$publishedAt = Request::input("published_at");
		$metaTitle = Request::input("meta_title");
		$metaDescription = Request::input("meta_description");

		$slug = str_slug($title, "-");
		$uploadPath = './assets/images/article/uploads/';

		$thumbPath = $uploadPath . $article->url_slug . '.thumb.jpg';
		$newThumbPath = $uploadPath . $slug . '.thumb.jpg';
		if (file_exists($thumbPath)) {
			rename($thumbPath, $newThumbPath);
		}

		$slidePath = $uploadPath . $article->url_slug . '.xsell.png';
		$newSlidePath = $uploadPath . $slug . '.xsell.png';
		if (file_exists($slidePath)) {
			rename($slidePath, $newSlidePath);
		}

		$sharePath = $uploadPath . $article->url_slug . '.share.jpg';
		$newSharePath = $uploadPath . $slug . '.share.jpg';
		if (file_exists($sharePath)) {
			rename($sharePath, $newSharePath);
		}

		$storage = new FileSystem($uploadPath, true);

		try {
			$fileThumb = new File('thumb', $storage);
			if (intval($fileThumb->getSize())) {
				$fileThumb->setName($slug . '.thumb');
				$fileThumb->addValidations(array(
					new Mimetype('image/jpeg'),
					new Size('1M'),
				));
				$fileThumb->upload();
			}

			$fileXsell = new File('xsell', $storage);
			if (intval($fileXsell->getSize())) {
				$fileXsell->setName($slug . '.xsell');
				$fileXsell->addValidations(array(
					new Mimetype('image/png'),
					new Size('1M'),
				));
				$fileXsell->upload();
			}

			$fileShare = new File('share', $storage);
			if (intval($fileShare->getSize())) {
				$fileShare->setName($slug . '.share');
				$fileShare->addValidations(array(
					new Mimetype('image/jpeg'),
					new Size('1M'),
				));
				$fileShare->upload();
			}

		} catch (Exception $ex) {
			// Fail!
			/*$errors = $fileThumb->getErrors();
			$errors = $fileXsell->getErrors();
			$errors = $fileShare->getErrors();
			return $errors;*/
			die($ex->getMessage());
		}

		$article->title = $title;
		$article->url_slug = $slug;
		$article->content = $content;
		$article->intro = $intro;
		$article->share_en = $shareEN;
		$article->share_ms = $shareBM;
		$article->published_at = $publishedAt;
		$article->meta_title = $metaTitle;
		$article->meta_description = $metaDescription;
		$article->save();

		return redirect('/admin/articles');

	}

	public function delete($id) {

		$article = Article::select('id', 'title', 'url_slug', 'content', 'published_at')->find($id);
		$file1 = "./assets/images/article/uploads/" . $article->url_slug . '.thumb.jpg';
		$file2 = "./assets/images/article/uploads/" . $article->url_slug . '.xsell.png';
		$file3 = "./assets/images/article/uploads/" . $article->url_slug . '.share.jpg';

		try {
			$article = Article::find($id);
			if (!$article) {
				return ResponseHelper::OutputJSON('fail', 'id not found');
			}

			unlink($file1);
			unlink($file2);
			unlink($file3);

			$article->enable = 0;
			$article->save();
			return ResponseHelper::OutputJSON('success');

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('fail', 'exception');
		}
	}
}
