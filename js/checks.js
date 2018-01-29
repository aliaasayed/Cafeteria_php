var date_from = document.getElementById('date-from');
var date_to = document.getElementById('date-to');
var hidden_id=document.getElementsByClassName('hide');
var plus=document.getElementsByClassName('plus');
var plus_order=document.getElementsByClassName('plus_order');
var date1 = new Date();
function formatDate(date1) {
  return date1.getFullYear() + '-' +(date1.getMonth() < 9 ? '0' : "") + (date1.getMonth()+1) + '-' + (date1.getDate() < 10 ? '0' : "") + date1.getDate();
}
console.log(formatDate(date1))

for(var i = 0;i<plus.length;i++)
{
plus[i].addEventListener('click',function (e) {
    var user_id = e.target.parentElement.parentElement.parentElement.id

    e.preventDefault();
      console.log('event')
    if((date_from.value > formatDate(date1)) || (date_to.value > formatDate(date1)))
    {
      window.location.href='checks.php?invalid=invalid_date';
    }
    else{
    window.location.href='checks.php?date_from='+date_from.value+'&date_to='+date_to.value+'&table1=block&user_id='+user_id;
    date_from.value=date_from.value;
  }
})
}

for(var j = 0;j<plus_order.length;j++)
{
plus_order[j].addEventListener('click',function (e) {
    var order_id = e.target.parentElement.parentElement.parentElement.id
    e.preventDefault();
    window.location.href=window.location.toString()+'&table2=block&order_id='+order_id;
    date_from.value=date_from.value;
})
}
function div() {
    document.getElementById('d1').style.display="block";
}
