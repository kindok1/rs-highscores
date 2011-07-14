<?php
require_once('config.php');
global $connect;

require_once('classes/class.Highscores.php');
$Highscores = new Highscores($connect);

$selected_skill = -1;
$title = '<img style="margin-top: 3px;" class="miniimg_list" id="image_caption" src="assets/img/skill_icon_overall1.gif"> Overall Highscores';
$content = '';
if(!isset($_GET['action']))
	$_GET['action'] = '';
switch($_GET['action'])
{
	default:
	case 'skill':
		$data = false;
		$start = (isset($_GET['page']) ? $_GET['page'] * 20 : 0);
		if($_GET['action'] == 'skill' && isset($_GET['skill_id']) && is_numeric($_GET['skill_id']) && $_GET['skill_id'] >= 0 && $_GET['skill_id'] < $Highscores->skills['overall'])
		{
			$selected_skill = $_GET['skill_id'];
			$data = $Highscores->SkillIndexForRankedList($_GET['skill_id'],$start);
			$title = '<img style="margin-top: 3px;" class="miniimg_list" id="image_caption" src="assets/img/skill_icon_'.$Highscores->skills[$_GET['skill_id']].'1.gif"> '.ucfirst($Highscores->skills[$_GET['skill_id']]).' Hiscores';
		}
		if($data === false)
			$data = $Highscores->SkillIndexForRankedList('overall',$start);
		foreach($data as $rank => $player)
		{
			$level = $player[(isset($_GET['skill_id']) ? ucfirst($Highscores->skills[$_GET['skill_id']]).'lvl' : 'lvl')];
			$exp = $player[(isset($_GET['skill_id']) ? ucfirst($Highscores->skills[$_GET['skill_id']]).'xp' : 'xp')];
			$content .= '<tr>';
				$content .= '<td class="rankHead">'.number_format($rank).'</td>';
				$content .= '<td class="nameHead">'.$player['playerName'].'</td>';
				$content .= '<td class="levelHead">'.number_format($level).'</td>';
				$content .= '<td class="xpHead">'.number_format($exp).'</td>';
			$content .= '</tr>';
		}
	break;
	case 'player':
	break;
	case 'search':
	break;
	case 'compare':
	break;
}
$list = '<li'.($selected_skill == -1 ? ' style="background-color:#4c350a"' : '').'>
<a href="index.php" target="_self" class="   Overall    ico">
Overall
</a>
</li>';
foreach($Highscores->skills as $skill_id => $skill_name)
{
	if(is_numeric($skill_id) && $skill_id < $Highscores->skills['overall'])
	{
		$list .= '
<li'.($selected_skill == $skill_id ? ' style="background-color:#4c350a"' : '').'>
<a href="?action=skill&skill_id='.$skill_id.'" target="_self" class="   '.ucfirst($skill_name).'    ico">

'.ucfirst($skill_name).'
</a>
</li>';
	}
}
?>