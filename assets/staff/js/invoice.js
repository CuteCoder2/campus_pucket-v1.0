let s_stud = document.getElementById('s_stud');
let stud_name = document.getElementById('stud_name');
let course = document.getElementById('course');
let tbody = document.getElementById('tbody');
let matriculation = document.getElementById('matriculation');
let level = document.getElementById('level');
let total = document.getElementById('total');
let img = document.getElementById('img');
let left = document.getElementById('left');

s_stud.addEventListener('submit',(e)=>{
    e.preventDefault();
    
    let value = s_stud.elements.search_bar.value ;
    let xhr = new XMLHttpRequest();
    
    xhr.open('get','../functions/get_student_invoice.php?matriculation='+value,true);

    xhr.onload = ()=>{
        
        if(xhr.readyState == 4 && xhr.status == 200){
            
            // console.log(xhr.responseText);
            let result = JSON.parse(xhr.responseText);
            
            if(result.length >= 1){
                if(result[0].oname == null){
                    
                    stud_name.textContent = result[0].fname+" "+result[0].lname;
                }else{
                    stud_name.textContent = result[0].fname+" "+result[0].oname;
                }
                course.innerText = result[0].sub_serie_name;
                matriculation.innerHTML = result[0].matriculation;
                level.innerHTML = result[0].class_name;
                img.src = result[0].picture;
                left.innerHTML = result[0][47];
                tbody.innerHTML = "";
                let i = 1;
                let num = 0;
                result.forEach(element => {
                    let tr  = document.createElement('tr');
                    let td1 = document.createElement('td');
                    td1.textContent =  i ;
                    tr.appendChild(td1);
                    td1.className = "text-center";
                    let td2 = document.createElement('td');
                    td2.innerHTML = element.motif;
                    td2.className = "text-center";
                    tr.appendChild(td2);
                    let td3 = document.createElement('td');
                    td3.innerHTML = element.method;
                    td3.className = "text-center";
                    tr.appendChild(td3);
                    let td4 = document.createElement('td');
                    td4.innerHTML = element.date;
                    td4.className = "text-center";
                    tr.appendChild(td4);
                    let td5 = document.createElement('td');
                    td5.innerHTML = element.id_payment;
                    td5.className = "text-center";
                    tr.appendChild(td5);
                    let td6 = document.createElement('td');
                    td6.innerHTML = element.amount;
                    td6.className = "text-center";
                    tr.appendChild(td6);
                    
                    i++;
                    
                    let totale = 0;
                    num += Number(td6.innerHTML);

                    total.innerText = num;

                    tbody.appendChild(tr);

                    
                });

                
            }else{
                console.log("no dat found");
            }
        }
    }

    xhr.send();
})
