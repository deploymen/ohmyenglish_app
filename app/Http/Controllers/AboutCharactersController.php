<?php namespace App\Http\Controllers;

use App;
use App\Libraries\ResponseHelper;
use App\Models\AboutCharacterEn;
use App\Models\AboutCharacterMs;
use Exception;
use Request;
use Upload\File;
use Upload\Storage\FileSystem;
use Upload\Validation\Mimetype;
use Upload\Validation\Size;

Class AboutCharactersController extends Controller {

	public function updateCharacter() {

        try {
            $id =  Request::input("id");
            $name = Request::input("name");
            $quote = Request::input("quote");
            $side_story_en = Request::input("side_story_en");
            $side_story_bm = Request::input("side_story_bm");
            $uploadPath = './assets/images/about-inner/uploads/';
   
            $aboutCharacterEn = AboutCharacterEn::find($id);
            $aboutCharacterMs = AboutCharacterMs::find($id);

            $slug = str_slug($name, "-");

            $thumbPath = $uploadPath . $aboutCharacterEn->url_slug . '_vector.png';
            $newThumbPath = $uploadPath . $slug . '_vector.png';
            if (file_exists($thumbPath)) {
                rename($thumbPath, $newThumbPath);
            }

            $storage = new FileSystem($uploadPath, true);

            $thumb = new File('thumb', $storage);
            if (intval($thumb->getSize())) {
                $thumb->setName($slug.'_vector');
                $thumb->addValidations(array(
                    new Mimetype('image/png'),
                    new Size('1M'),
                ));
                $thumb->upload();
            }
            
            $aboutCharacterEn->name = $name;
            $aboutCharacterEn->url_slug = $slug;
            $aboutCharacterEn->quote = $quote;
            $aboutCharacterEn->side_story = $side_story_en;
            $aboutCharacterEn->save();

            $aboutCharacterMs->url_slug = $slug;
            $aboutCharacterMs->side_story = $side_story_bm;
            $aboutCharacterMs->save();

        } catch (Exception $ex) {
            // Fail!
            die($ex->getMessage());
        }

        return redirect('/admin/about-characters');
    }

}
