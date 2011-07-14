<?php
class Highscores {
	public $skills = array (
		'attack','defence','strength','hitpoints','range',
		'prayer','magic','cooking','woodcutting','fletching',
		'fishing','firemaking','crafting','smithing','mining',
		'herblore','agility','thieving','slayer','farming',
		'runecraft',
		'overall'
	);

	private $database = false;

	public function __construct($database)
	{
		foreach(array_flip($this->skills) as $key => $value)
			$this->skills[$key] = $value;
		$this->database = $database;
	}

	public function LevelForExperience($levels)
	{
		$experience = 0;
		for($level = 1; $level < $levels; $level++)
		{
			$experience += floor($level + 300 * pow(2, ($level / 7)));
		}
		return floor($experience / 4);
	}

	public function PlayerNameForSkills($player_name)
	{
		if($this->database === false)
			return false;
		if(strlen($player_name) == 0)
			return false;
		$return_val = array();
		$sql = 'SELECT * FROM skills LEFT JOIN skillsoverall ON skills.playerName = skillsoverall.playerName WHERE skills.playerName = "'.$player_name.'"';
		$query = mysql_query($sql);
		$return_val = mysql_fetch_assoc($query);
		return $return_val;
	}

	public function PlayerNameForSkillRank($player_name,$skill_index)
	{
		if($this->database === false)
			return false;
		if(strlen($player_name) == 0)
			return false;
		if(!isset($this->skills[$skill_index]))
			return false;
		$is_overall = ($skill_index == $this->skills['overall']);
		$sql_table = ($is_overall ? 'skillsoverall' : 'skills');
		$sql_columns = ($is_overall ? 'xp,lvl' : ucfirst($this->skills[$skill_index]).'lvl,'.ucfirst($this->skills[$skill_index]).'xp');
		$sql_order_by = ($is_overall ? 'xp DESC,lvl DESC' : ucfirst($this->skills[$skill_index]).'lvl DESC,'.ucfirst($this->skills[$skill_index]).'xp DESC');
		$return_val = 'u';
		$sql = 'SELECT '.$sql_columns.' FROM '.$sql_table.' ORDER BY '.$sql_order_by.' LIMIT 1000';
		$query = mysql_query($sql);
		$rank = 1;
		while($result = mysql_fetch_assoc($query))
		{
			if($result['playerName'] == $player_name)
			{
				$return_val = $rank;
				break;
			}
			$rank++;
		}
		return $return_val;
	}

	public function SkillIndexForRankedList($skill_index,$start)
	{
		if($this->database === false)
			return false;
		if(!isset($this->skills[$skill_index]))
			return false;
		if(!is_numeric($skill_index))
			$skill_index = $this->skills[$skill_index];
		$is_overall = ($skill_index == $this->skills['overall']);
		$sql_table = ($is_overall ? 'skillsoverall' : 'skills');
		$sql_columns = ($is_overall ? 'lvl,xp' : ucfirst($this->skills[$skill_index]).'xp,'.ucfirst($this->skills[$skill_index]).'lvl');
		$sql_order_by = ($is_overall ? 'lvl DESC,xp DESC' : ucfirst($this->skills[$skill_index]).'xp DESC,'.ucfirst($this->skills[$skill_index]).'lvl DESC');
		$return_val = array();
		$sql = 'SELECT playerName,'.$sql_columns.' FROM '.$sql_table.' ORDER BY '.$sql_order_by.' LIMIT '.$start.',20';
		$query = mysql_query($sql);
		$rank = $start + 1;
		while($result = mysql_fetch_assoc($query))
		{
			$return_val[$rank++] = $result;
		}
		return $return_val;
	}
}
?>