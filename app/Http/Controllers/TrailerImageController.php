<?php namespace App\Http\Controllers;

use App;
use App\Models\VideoTrailerEn;
use Exception;
use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;

/*
use App;
use Session;
use Config;
use DB;
use App\Models;


use App\Libraries\ResponseHelper;
 */

Class TrailerImageController extends Controller {

	public function create() {

		$storage = new FileSystem('./assets/images/about/trailer/uploads', true);
		for ($i = 0; $i < 20; $i++) {
			try {
				$file = new File('ep-' . $i, $storage);
				if (!intval($file->getSize())) {
					continue;
				}

				$trailer = VideoTrailerEn::select("url_name")->where('week', $i + 1)->first();
				if (!$trailer) {
					continue;
				}

				$file->setName($trailer->url_name);
				$file->addValidations(array(
					new Mimetype('image/jpeg'),
					new Size('1M'),

				));
				$file->upload();

			} catch (\Exception $ex) {
				// Fail!
				die($ex->getMessage());
				$errors = $file->getErrors();
				return $errors;
				// die('invalid / exceed 2MB image');
			}

		}

		die('success');
		return redirect('/admin/trailer-image');

	}

}
