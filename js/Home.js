
var data_2d = DATA.split("\n").map(function(e) {
    return e.split(",").map(String);
})

var row=data_2d.length
var col=data_2d[0].length
data_2d.splice(row-1, 1);
row=data_2d.length
images=[]


var order_amount=document.getElementById('order_amount')
var product_list=document.getElementById('product_list')
var reciept=document.getElementById('reciept')
var products_num=document.getElementById('products_num')
var Total=document.getElementById('Total')
var select_room=document.getElementById('select_Room')
var select_User_name=document.getElementById('user_id')
var admin_or_user=document.getElementById('admin')
Options=Options.split("\n");
order_amount.value=0;
Total.innerText=0;
var counter_clicks=0

if(admin_or_user.value == '1')
{
    var User_name_options = User_name_options.split("\n").map(function(e) {
return e.split(",").map(String);
 })
    var len=User_name_options.length
    User_name_options.splice(len-1, 1);
}


window.addEventListener('load',function(){

if(admin_or_user.value == '1')
{

   for (var i = 0; i<User_name_options.length; i++){

    var opt = document.createElement("option");
    opt.value = parseInt(User_name_options[i][0]);
    opt.innerHTML = User_name_options[i][1];
    select_User_name.add(opt);
    $('.selectpicker').selectpicker('refresh')
   }


}

 for (var i = 0; i<Options.length-1; i++){

    var opt = document.createElement("option");
    opt.value = parseInt(Options[i]);
    opt.innerHTML = Options[i];
    select_room.add(opt);
    $('.selectpicker').selectpicker('refresh')
}


 for(var i=0;i<row;i++){

    var element=document.createElement('div')
    element.className="product_list_element"
 	var img=document.createElement('img')
 	img.src=data_2d[i][3]
    img.id=i
 	img.className="product_photo"
    images.push(img)

 	element.appendChild(img)

    var product_name=document.createElement('p')
    product_name.className="label label-primary"
    product_name.innerText=data_2d[i][1]

    var price=document.createElement('span')
    price.className="badge"
    price.innerText=data_2d[i][2] + " EGP"

    product_name.appendChild(price)

    element.appendChild(product_name)

    var line_break=document.createElement('br')
     element.appendChild(line_break)

    product_list.appendChild(element)

 }


images.forEach(function(elem) {
    elem.addEventListener("click", function() {

    counter_clicks++;
    products_num.value=parseInt(counter_clicks);
    var element=document.createElement('div')
    element.id="product" +elem.id
    console.log(elem.id)


    var product_name=document.createElement('p')
    product_name.innerText=data_2d[elem.id][1] + "  "
    product_name.className="element_order"
    product_name.name="product_name_"+elem.id
    element.appendChild(product_name)


    var product_quantity=document.createElement('input')
    product_quantity.name=data_2d[elem.id][0]
    product_quantity.type="text"
    product_quantity.value=1
    product_quantity.style.width="50px"
    element.appendChild(product_quantity)

    var price=document.createElement('p')
    price.className="element_order"
    price.innerText=data_2d[elem.id][2]
    price.name="price"+elem.id

    if(counter_clicks==1)
    {
        Total.innerText=parseInt(price.innerText)
        order_amount.value=parseInt(price.innerText)
    }
    else
    {
        order_amount.value=parseInt(order_amount.value)+parseInt(price.innerText)
        Total.innerText=parseInt(Total.innerText)+parseInt(price.innerText)
    }

    var product_add=document.createElement('span')
    product_add.className="glyphicon glyphicon-plus"
    product_add.addEventListener('click',function()
    {
      product_quantity.value++ ;
      price.innerText=parseInt(price.innerText)+parseInt(data_2d[elem.id][2])
      if(order_amount.value == data_2d[elem.id][2] || counter_clicks==1 )
        {
         order_amount.value=parseInt(price.innerText)
         Total.innerText=parseInt(price.innerText)
        }
      else
        {
         order_amount.value=parseInt(order_amount.value)+parseInt(data_2d[elem.id][2])
         Total.innerText=parseInt(Total.innerText)+parseInt(data_2d[elem.id][2])

        }

    })

    element.appendChild(product_add)

    var product_del=document.createElement('span')
    product_del.className="glyphicon glyphicon-minus"
    product_del.addEventListener('click',function()
    {
      if(product_quantity.value > 1)
      {
        product_quantity.value-- ;
        price.innerText=price.innerText-parseInt(data_2d[elem.id][2])
        if(order_amount.value ==data_2d[elem.id][2] || counter_clicks==1 )
        {
         order_amount.value=parseInt(price.innerText)
         Total.innerText=parseInt(price.innerText)
        }
        else
        {
         Total.innerText=parseInt(Total.innerText)-parseInt(data_2d[elem.id][2])

        }
      }


    })
    element.appendChild(product_del)


    var price_tag=document.createElement('p')
    price_tag.className="element_order"
    price_tag.innerText=" EGP  "
    element.appendChild(price_tag)


    element.appendChild(price)


    var product_delete=document.createElement('span')
    product_delete.className="glyphicon glyphicon-remove-circle "

    product_delete.addEventListener('click',function()
    {
      order_amount.value=parseInt(order_amount.value)-parseInt(price.innerText)
      Total.innerText=parseInt(Total.innerText)-parseInt(price.innerText)
      counter_clicks--;
      products_num.value=parseInt(counter_clicks)
      reciept.removeChild(element)

    })
    element.appendChild(product_delete)


   reciept.insertBefore(element,reciept.firstChild)


    });
});


})
