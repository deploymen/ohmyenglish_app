<?php namespace App\Http\Controllers;

use App;
use App\Libraries\ResponseHelper;
use App\Models\HomeBanner;
use Exception;
use Request;
use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;

Class HomeBannerController extends Controller {

	public function get() {
		try {
			$page = Request::input("page", 1);
			$perPage = Request::input("per_page", 8);

			$banner = HomeBanner::where('enable', 1)->select('title', 'link')->paginate($perPage);
			$banner->setPath('api/home-banner/list');
			return ResponseHelper::OutputJSON('success', '', [
				'banner' => $banner->toArray(),
			]);
		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('fail', 'exception');
		}
	}

	public function banner() {

    	$id =  Request::input("id" , '0');
    	$title = Request::input("title");
    	$link = Request::input("link");
        $uploadPath = './assets/images/home-banner/uploads/';

        $title = str_slug($title, "-");
        $specs = [
            ['fileUpload1', '{title}.ms_lg', '1920x495'], //0
            ['fileUpload2', '{title}.ms_sm', '1280x495'], //1
            ['fileUpload3', '{title}.ms_xs', '768x523'], //2
            ['fileUpload4', '{title}.en_lg', '1920x495'], //3
            ['fileUpload5', '{title}.en_sm', '1280x495'], //4
            ['fileUpload6', '{title}.en_xs', '768x523'], //5
        ];

        $storage = new FileSystem($uploadPath, true);
        $fileValidation = array(
                new Mimetype('image/jpeg'),
                new Size('1M'),
            );

        $homeBanner = HomeBanner::find($id);

        for($i=0; $i<6; $i++){
            $spec = $specs[$i];
            $banner = new File($spec[0], $storage);

            $newName = str_replace('{title}', $title, $spec[1]);

            if($homeBanner){
                $oldName = str_replace('{title}', $homeBanner->image_filename, $spec[1]);
                
                if (file_exists($uploadPath.$oldName.'.jpg')) {
                    rename($uploadPath.$oldName.'.jpg' , $uploadPath.$newName.'.jpg');
                }
            }else{
                $homeBanner = new HomeBanner;
            }

            if (!intval($banner->getSize())) {
               continue; 
            }

            $uploadDimention = $banner->getDimensions()['width'].'x'.$banner->getDimensions()['height'];
            if($uploadDimention != $spec[2]){
                continue;
            }                

            $banner->setName($newName);
            $banner->addValidations($fileValidation);

            try{
                $banner->upload();
            }catch(Exception $ex){
                continue;
            }                    
        }

        $homeBanner->image_filename = $title;
        $homeBanner->banner_link = $link;
        $homeBanner->enable = 1;
        $homeBanner->save();     



        return redirect('/admin/home-banner');
	}


	public function delete($id) {

		$banners = HomeBanner::select('id', 'title', 'link')->find($id);

        $fileArray = array(
            "./assets/images/home-banner/uploads/" . $banners->title . '.ms1_1920x495.jpg',
            "./assets/images/home-banner/uploads/" . $banners->title . '.ms2_1280x495.jpg',
            "./assets/images/home-banner/uploads/" . $banners->title . '.ms3_768x523.jpg',
            "./assets/images/home-banner/uploads/" . $banners->title . '.en1_1920x495.jpg',
            "./assets/images/home-banner/uploads/" . $banners->title . '.en2_1280x495.jpg',
            "./assets/images/home-banner/uploads/" . $banners->title . '.en3_768x523.jpg'
        );

		try {
			$banners = HomeBanner::find($id);
			if (!$banners) {
				return ResponseHelper::OutputJSON('fail', 'id not found');
			}

            foreach ($fileArray as $value) {
                if (file_exists($value)) {
                    unlink($value);
                } else {
                    continue;
                }
            }

			$banners->enable = 0;
			$banners->save();
			return ResponseHelper::OutputJSON('success');

		} catch (Exception $ex) {
			return ResponseHelper::OutputJSON('fail', 'exception');
		}
	}

}
