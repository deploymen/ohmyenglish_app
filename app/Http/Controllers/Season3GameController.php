<?php namespace App\Http\Controllers;

use App;
use App\Models\Season3MiniGame;
use DB;
use Request;

Class Season3GameController extends Controller {

	public function save_withoutname_minigameleaderboard_forall() {

		$record = new Season3MiniGame;
		$record->charMiniGame = Request::input("gameType");
		$record->points = Request::input("points");
		$record->gameSession = Request::input("gameSession");
		$record->createdDateTime = DB::raw('NOW()');
		$record->updatedDateTime = DB::raw('NOW()');
		$record->save();

		$sql = "
			SELECT  uo.*,
			        (
				        SELECT  COUNT(*)
				        FROM    `t0301_characterminigamesall` ui
				        WHERE   (CAST(ui.points AS UNSIGNED), ui.charminiID) >= (CAST(uo.points AS UNSIGNED), uo.charminiID)
				        	AND name != '' AND charMiniGame = '" . $record->charMiniGame . "'
			        ) AS rank
			FROM    `t0301_characterminigamesall` uo
			WHERE   charMiniGame = '" . $record->charMiniGame . "' and  charminiID = " . $record->charminiID;

		$result = DB::select($sql);

		if ($result) {
			echo $result[0]->rank;
		} else {
			echo "1";
		}

	}

	public function save_minigameleaderboard_forall() {
		$name = Request::input("name");
		$gameSession = Request::input("gameSession");
		if ($name == '' || $gameSession == '') {
			return;
		}

		$record = Season3MiniGame::where('gameSession', $gameSession)->orderBy('createdDateTime', 'desc')->first();
		$record->name = $name;
		$record->updatedDateTime = DB::raw('NOW()');
		$record->save();

	}

	public function retrieve_minigamesleaderboard_forall() {
		$gameType = Request::input("gameType");

		$sql = "
		    SELECT  uo.*,
			        (
			        SELECT  COUNT(points)
			        FROM    `t0301_characterminigamesall` ui
			        WHERE   (CAST(ui.points AS UNSIGNED), ui.charminiID) >= (CAST(uo.points AS UNSIGNED), uo.charminiID) and name != '' and charMiniGame = '" . $gameType . "'
			         ) AS rank
			FROM    `t0301_characterminigamesall` uo
			WHERE   charMiniGame = '" . $gameType . "' and name != '' order by rank asc limit 10";

		$result = DB::select($sql);

		if ($gameType == "characterminigames2") {
			if (is_array($result) && count($result) > 0) {
				foreach ($result as $id => $value) {
					echo '
	    			<li class="clearfix">
					  	<div class="numbering" style="float: left ">' . $value->rank . '</div>
					  	<div style="float: left">
						  	<div class="username">' . $value->name . '</div>
						  	<div class="userscore">' . $value->points . '</div>
					  	</div>
					</li>
	    		';
				}

			} else {
				echo '<li class="clearfix">
					  	There is no result.
					</li>';
			}
		} else {
			if (is_array($result) && count($result) > 0) {
				foreach ($result as $id => $value) {
					echo '

	    			<li>
						<div class="leaderboard-numbering">' . $value->rank . '</div>
						<div class="leaderboard-info">
							<h1><span class="leaderboard-name">' . $value->name . '</span> | <span class="leaderboard-score">' . $value->points . '</span></h1>
						</div>
					</li>
	    		';
				}

			} else {
				echo '<li class="clearfix">
					  	There is no result.
					</li>';
			}
		}

	}

}
