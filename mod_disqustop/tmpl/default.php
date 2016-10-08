<div class="disquslatestop" class="<?php echo $moduleclass_sfx ?>">

<?php
$forumid = $params['forumid'];
$apikey = $params['apikey'];
$limit = $params['limit'];
  echo "<!--noindex-->";
  echo "<div class='avataruserstop'>";
  echo "<ol>";
if ($params['apikey'] !='') {
$get_disqustop = file_get_contents("http://disqus.com/api/3.0/forums/listMostActiveUsers.json?forum=$forumid&limit=$limit&api_key=$apikey");
$contenttop100 = json_decode($get_disqustop, true);

if ($contenttop100['code'] == 13) {
  echo "Превышен лимит системы Disqus, пожалуйста подождите немного.";
} else {
      foreach ($contenttop100['response'] as $details) {
  $dusername = $details['username'];
  $dname = $details['name'];
  $drep = $details['rep'];
  $dprofileUrl = $details['profileUrl'];
  $dnumPosts = $details['numPosts'];
  $dnumVotes = $details['numVotes'];
  $davatar = $details['avatar']['small']['cache'];

  echo "<li><blockquote><p><a rel='nofollow' target='_blank' class='avatarandurlcomment' href='".$dprofileUrl."'>" . "<img width='32px' height='32px' src='".$davatar."'> " .$dname. "</a> <small>(".$dusername.")</small></p>";
  echo "<p class='smaslluserinfo'>Комментариев: ".$dnumPosts."&nbsp;  /  &nbsp;  <span class='likeCount'> ".$dnumVotes."</span> &nbsp;  /  &nbsp; <span>Репутация: ".number_format($drep, 2)."</span></p></blockquote></li>";

    }
}

}
  echo "</ol>";
  echo "</div>";
  echo "<!--/noindex-->";


?>
</div>