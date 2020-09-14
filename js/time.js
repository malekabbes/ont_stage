
var onttemps = '<?=time();?>';
function updateTime(){
  $('#time').html(Date(onttemps));
  onttemps++;
}
$(function(){
  setInterval(updateTime, 1000);
});
