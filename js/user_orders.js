var date_from = document.getElementById('date-from');
var date_to = document.getElementById('date-to');
var confirm = document.getElementById('confirm');
var cancel = document.getElementsByClassName('cancel');
var plus_order = document.getElementsByClassName('plus_order')
console.log(date_to.value)
confirm.addEventListener('click',function () {
  window.location.href='user_orders.php?date_from='+date_from.value+'&date_to='+date_to.value;

})
for(var j = 0;j<cancel.length;j++)
{
cancel[j].addEventListener('click',function (e) {
  var o_id = e.target.parentElement.parentElement.id
  e.preventDefault();
  window.location.href=window.location.toString()+'&o_id='+o_id;

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
