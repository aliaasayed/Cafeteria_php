var date_from = document.getElementById('date-from');
var date_to = document.getElementById('date-to');
var date1 = new Date();
function formatDate(date1) {
  return date1.getFullYear() + '-' +(date1.getMonth() < 9 ? '0' : "") + (date1.getMonth()+1) + '-' + (date1.getDate() < 10 ? '0' : "") + date1.getDate();
}
console.log(formatDate(date1))
console.log(date_from.value);
var plus=document.getElementsByClassName('plus')
for(var i = 0;i<plus.length;i++)
{
plus[i].addEventListener('click',function (e) {
    e.preventDefault();
    if((date_from.value > formatDate(date1)) || (date_to.value > formatDate(date1)))
    {
      window.location.href='checks.php?invalid=invalid_date';
    }
    else{
    window.location.href='checks.php?date_from='+date_from.value+'&date_to='+date_to.value+'&msg=block';
  }
})
}
function div() {
    document.getElementById('d1').style.display="block";
}
