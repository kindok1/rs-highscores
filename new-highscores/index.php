<?php require_once('includes/index.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="icon" type="image/vnd.microsoft.icon" href="assets/img/favicon.ico">
<title>YOUERSERVER HighScores</title>
<style type="text/css">/*\*/@import url(assets/css/index.css);/**/</style>
<script type="text/javascript" src="http://www.jagex.com/js/jquery/jquery_1_3_2.js"></script>
</head>
<body id="navcommunity" class="bodyBackground">
<div id="scroll">
<div id="head"><div id="headBg">
<div class="navigation">
  <div class="location">
<b>Location: </b> <a href="FORUMSLINK">Forums</a> &gt;
Hiscores
</div>

</div>
</div></div>
<div id="content">
<div id="article">
<div class="sectionHeader">
<div class="left">
<div class="right">
<div class="plaque">
YOUERSERVER HighScores
</div>
</div>
</div>
</div>
<div class="section">
<!--[if lt IE 6]>
<style type="text/css">
 #skillsList_back {
  width: 173px;
 }
 #skillsList ul li a:hover {
  height: 19px;
 }
 #skillsList ul li a {
  height: 19px;
 }
 #playerList_back {
  width: 381px;
 }
 .table_back tr {
  color: #f9deb3;
 }
 .table_back th {
  color: white;
 }
 .table_back {
  text-align: center;
 }
 #PlayerSkill_back {
  width: 363px;
 }
 #mini_player, #skill_player {
  width: 353px;
 }
 #scores_head {
  padding-top: 5px;
 }
 #compare_header {
  padding-top: 6px;
 }
</style>
<![endif]-->
<div class="brown_background">
<div id="hiscores_background" class="inner_brown_background">
<div id="skillsList_back" class="brown_box">
<div class="subsectionHeader">Skills</div>
<div id="skillsList">
<ul>
<?php echo $list; ?>
</ul>
</div>
<div class="subsectionHeader"></div>
</div>
<div id="playerList_back" class="brown_box">

<div id="scores_head" class="subsectionHeader" style="padding: 0px;">
<?php echo $title; ?>
</div>
<table border="0" width="100%">
<table class="table_back">
<tbody>
<thead>
<tr class="table_header">
<th class="rankHead">Rank</th>
<th class="nameHead">Name</th>
<th class="levelHead">Level</th>
<th class="xpHead">XP</th>
</tr>
</thead>
<?php echo $content; ?>
</tbody>
</table>
<div class="arrow_back">
<div class="buttons_arrows">
<a id="button-up" href="'.$website.'/'.$file4.'?type=0&from='.$back.'">
<span class="lev1_arrow"></span>
U
</a>
<a id="button-down" href="'.$website.'/'.$file4.'?type=0&from='.$next.'">
<span class="lev1_arrow"></span>
D
</a>
</div>
</div>
</div>
<div id="search_back" class="brown_box">
<div class="subsectionHeader search_title">Search by Name</div>
<div class="search_small">
<input class="textinput text" maxlength="12" type="text" name="character" id="character">
<input class="buttonmedium" name="search" type="submit" value="Search" onclick="if(document.getElementById('character').value) { location.href = '?action=search&player='+document.getElementById('character').value; } else { alert('Please write a name'); }">
</div>
<div class="subsectionHeader search_title">Compare Players</div>
<div class="search_large" id="friends_search">
<div class="friendsContent">
<input class="textinput text" maxlength="12" type="text" name="player1" id="player1">
<input class="textinput text" maxlength="12" type="text" name="player2" id="player2">
<input id="search_friends" type="submit" class="buttonlong" value="Compare" onclick="if(document.getElementById('player1').value && document.getElementById('player2').value) { location.href = '?action=compare&player1='+document.getElementById('player1').value+'&player2='+document.getElementById('player2').value; } else { alert('Please write a name'); }">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer"><div class="contain">
<div class="footerdesc">
Website design and stylesheets are copyright © 1999 - 2010 Jagex Ltd<br />
MySQL/PHP By John (deathschaos9)
</div>

</body>
</html>