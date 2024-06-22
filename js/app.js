$(document).ready(function(){
  /*  $(document).on('click','#getData',function(event){
        event.preventDefault()
        // https://ecoindzz.test/webphp/data.txt
         $.ajax({
            url:'data.txt',
            type: "GET",
            //data:
            success: function(rep){
           // console.log(rep);
           $(".data").text(rep)
            },
            error:function(xhr,textStatus,errorTh){
                console.log(textStatus,errorTh);
            }

         })
    })*/



         // add Category By ajax
         $('#formCat').submit(function (event) {
            event.preventDefault()
            let cat = $('#cat').val()
            let text = $('#detail').val()
            console.log(cat,text);

           // let urls = $('form').getAttr('action')
           // let types = $('form').getAttr('method')

           // let fm = $('form').serialize()
            let fm = $('#formCat').serializeArray()
            console.log(fm);

            $.ajax({
                url:'ok.php',
                type: 'post',
                data: fm,
                success: function(rep,x){
                   console.log(rep,x);
                   if(rep){
                    $(".msg").text("Add Ok").show(1000).toggle(1000)
                    let h = setTimeout(function () {
                     location.href = "listAjax.php"
                },3000)
                   }  
                   
                  //  $(".data").text(rep)
                     },
              error:function(xhr,textStatus,errorTh){
                         console.log(xhr,textStatus,errorTh);
                     }

            })
         })  // end submit event

         $(document).on('click',".delete",function (event) {
            event.preventDefault()
            let test = $(this).data('id')
            //alert(test)
            let myId = {ecoin:test}



              /**************************** */
              Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
              }).then((result) => {
                   /*******Ajax ********** */
                   if (result.isConfirmed) {
                   $.ajax({
                    url:'delete.php',
                    type: 'get',
                    data: myId,
                    success: function(rep,x){
                      if(rep) {
                                    
                    Swal.fire({
                      title: "Deleted!",
                      text: "Your file has been deleted.",
                      icon: "success"
                    });
                    let h = setTimeout(function () {
                         location.href = "listAjax.php"
                    },3000)
                 
                      }
                       
                        //console.log(rep,x);
                    else console.log("errrrrrrrrrrrrrr");
                      //  $(".data").text(rep)
                         },
                  error:function(xhr,textStatus,errorTh){
                             console.log(xhr,textStatus,errorTh);
                         }
    
                })
            }// end confirm delete
                   /***************** */

              });
            /**************************** */
      
         })
})




/****************************************************** *
Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!"
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
      });
    }
  });
****************************************************** */



/***********************************/
const myCat = document.getElementById('catModal')
if (myCat) {
  myCat.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const edit = event.relatedTarget
    // Extract info from data-bs-* attributes
    const id = edit.getAttribute('data-id')
    const nom = edit.getAttribute('data-nom')
    const detail = edit.getAttribute('data-detail')
    // If necessary, you could initiate an Ajax request here
    // and then do the updating in a callback.
  
    // Update the modal's content.
    const nomInput = myCat.querySelector('#nom')
    const detailInput = myCat.querySelector('#detail')
    const idInput = myCat.querySelector('#id')

    nomInput.value = nom
    detailInput.value = detail
    idInput.value = id

    //modalTitle.textContent = `New message to ${recipient}`
    //modalBodyInput.value = recipient
    let update = document.querySelector("#update")
    update.addEventListener('click',function(){
    
         let data = {
          nom:nomInput.value, 
          detail:detailInput.value ,
          id:idInput.value 
         }
         /****************Update with ajax****************** */
         $.ajax({
          url:'update.php',
          type: 'post',
          data: data,
          success: function(rep){
           //  console.log(rep,x);
             if(rep){
             // $(".msg").text("Update Ok").show(1000).toggle(1000)
           /*  const myModal = new bootstrap.Modal(myCat, {
  keyboard: false
})
myModal.toggle()*/

          //console.log(myCat);
             

        let hh = setTimeout(function () {
                   location.href = "listAjax.php"
      },2000)
         // toastr.error('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
            
        }  
             
            //  $(".data").text(rep)
               },
        error:function(xhr,textStatus,errorTh){
                   console.log(xhr,textStatus,errorTh);
               }

      })
         /************************************************* */


    })
  })
}
  
 /**********************************/