let fee_form = document.getElementById('fee_form');

for(let i = 0 ; i < fee_form.elements.length; i++ ){
    
    fee_form.elements[i].addEventListener("keyup",filterFeeStudent);
}

for(let i = 0 ; i < fee_form.elements.length; i++ ){
    fee_form.elements[i].addEventListener('change',filterFeeStudent);
}



// Get the modal
var modal = document.getElementById("myModal");
var cancel = document.getElementById("cancel");

// reseting the modl vie to none
cancel.addEventListener('click',()=>{

    modal.style.display = "none";

});


function setModal(matriculation){
    let img = document.getElementById('img');
    let name = document.getElementById('name');
    let matri = document.getElementById('matriculation');
    let fees = document.getElementById('fee');
    let level = document.getElementById('level');
    let stud_fee = document.getElementById('stud_fee');
    let stud_matri = document.getElementById('stud_matri');
    let class_name = document.getElementById('class_name')

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../functions/filter_student.php?matriculation="+matriculation);
            
    xhr.onload = function(){
        if(xhr.readyState == 4 && xhr.status == 200 ){
            
            let resulte = JSON.parse(xhr.responseText);
            console.log(resulte);
            img.src = resulte[0].picture;
            if(resulte[0].oname != null){

                name.innerHTML = (resulte[0].fname+" "+resulte[0].oname+" "+resulte[0].lname).toUpperCase();
            }else{
                name.innerHTML = (resulte[0].fname+" "+resulte[0].lname).toUpperCase();

            }

            matri.innerHTML = (matriculation).toUpperCase();
            fees.value = resulte[0].fee;
            level.innerHTML = (resulte[0].class_name).toUpperCase();
            stud_fee.value = resulte[0].fee;
            stud_matri.value = matriculation;
            class_name.value = resulte[0].class_name;


        }
    }

    xhr.send();

        modal.style.display = "block";
        
    }







function filterFeeStudent(){
    let matriculation = fee_form.elements.matriculation.value; 
        let fname = fee_form.elements.fname.value; 
        let lname = fee_form.elements.lname.value; 
        let class_name = fee_form.elements.class_name.value; 
        let sub_serie = fee_form.elements.sub_serie.value;
        let list = document.getElementById('list'); 
        
        let xhr = new XMLHttpRequest();
        
        xhr.open("GET", "../functions/filter_student.php?matriculation="+matriculation+"&fname="+fname+"&lname="+lname+"&class_name="+class_name+"&sub_serie="+sub_serie,true);
        
        xhr.onload = function(){
            if (xhr.readyState == 4 && xhr.status == 200 ) {
                resulte = JSON.parse(xhr.responseText);
                // console.log(resulte);
                if (resulte !== []) {
                        list.innerHTML = "";
                        resulte.forEach(element => {
                            let li = document.createElement('li');
                            let div1 = document.createElement('div');
                            let div2 = document.createElement('div');
                            let div3 = document.createElement('div');
                            let div4 = document.createElement('div');
                            let div5 = document.createElement('div');
                            let hr = document.createElement('hr');
                            let h4 = document.createElement('h4');
                            let img = document.createElement('img');
                            let i = document.createElement('i');
                            let p1 = document.createElement('p');
                            let p2 = document.createElement('p');
                            let button = document.createElement('button');
                            
                            li.className = "list-group-item  border-0";
                            div1.className = "col-12";                                    
                            button.className = "btn purple mt-4 btn-outline";
                            button.textContent = "porceed to payement";
                                 
                            button.onclick = ()=>{
                                setModal(element.matriculation)
                            }                
                            div2.className = "row";
                            div3.className = "col-4 user-img  pt-1";
                            div4.className = "col-8";
                            div5.className = "user-detail";
                            h4.className = "mb-0";
                            p2.className = "text-success"
                            img.className = " img-circle rounded-circle";
                            img.height = 150;
                            img.width = 150;
                            i.className = "fa fa-money mx-2";
                            hr.style.height = "2px";
                            img.src = element.picture;
                            h4.textContent = textContent = element.fname.toUpperCase()+" "+element.lname.toUpperCase();
                            li.appendChild(div1);
                            li.appendChild(hr);
                            div1.appendChild(div2);
                            div2.appendChild(div3);
                            div2.appendChild(div4);
                            div3.appendChild(img);
                            div4.appendChild(h4);
                            div4.appendChild(div5);
                            div5.appendChild(p1)
                            div5.appendChild(p2)
                            div5.appendChild(button)
                            p2.appendChild(i);
                            p1.textContent = element.matriculation;
                            p2.append(element.fee+" XAF");

                            list.appendChild(li)


                        });

                    }else{
                        list.innerHTML = "empty ARRAY";
                    }
                }
            
        }

        xhr.send();
}






