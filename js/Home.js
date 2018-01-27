
var data_2d = DATA.split("\n").map(function(e) {
    return e.split(",").map(String);
})
data_2d.splice(2, 1);
var row=data_2d.length
var col=data_2d[0].length
images=[]


var product_list=document.getElementById('product_list')
var reciept=document.getElementById('reciept')
var label_notes=document.getElementById('label_notes')

window.addEventListener('load',function(){

 
 for(var i=0;i<row;i++){
   
    var element=document.createElement('div')
    element.className="product_list_element"
 	  var img=document.createElement('img')
 	  img.src=data_2d[i][3]
    img.id=data_2d[i][0]
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
    product_list.appendChild(element)
    
 }


images.forEach(function(elem) {
    elem.addEventListener("click", function() {
     
    var element=document.createElement('div')
    element.id="product" +elem.id

    
    var product_name=document.createElement('p')
    product_name.innerText=data_2d[elem.id-1][1] + "  "
    product_name.className="element_order"
    product_name.name="product_name"+elem.id
    element.appendChild(product_name)


    var product_quantity=document.createElement('input')
    product_quantity.name="product_quantity"+elem.id
    product_quantity.type="text"
    product_quantity.value=1
    product_quantity.style.width="50px"
    element.appendChild(product_quantity)

    var price=document.createElement('p')
    price.className="element_order"
    price.innerText=data_2d[elem.id-1][2]
    price.name="price"+elem.id

    var product_add=document.createElement('span')
    product_add.className="glyphicon glyphicon-plus"
    product_add.addEventListener('click',function()
    {
      product_quantity.value++ ;
      price.innerText=parseInt(price.innerText)+parseInt(data_2d[elem.id-1][2])
      
    })

    element.appendChild(product_add)

    var product_del=document.createElement('span')
    product_del.className="glyphicon glyphicon-minus"
    product_del.addEventListener('click',function()
    {
      if(product_quantity.value > 1)
      {
        product_quantity.value-- ;
        price.innerText=price.innerText-parseInt(data_2d[elem.id-1][2])
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
      reciept.removeChild(element)

    })
    element.appendChild(product_delete)


   reciept.insertBefore(element,reciept.firstChild)

   
    });
});


})
