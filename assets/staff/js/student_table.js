var filter_table = document.getElementById('filter_table');

filter_table.addEventListener('change',(e)=>{
    let gender = filter_table.elements.gender.value;
    let classes = filter_table.elements.class.value;
    let series = filter_table.elements.serie.value;
    let sub_serie = filter_table.elements.sub_serie.value;
    let body_table = document.getElementById('body_table');

    let ajax = new XMLHttpRequest();

    ajax.open("get","../functions/filter_student.php?gender="+gender+"&class_name="+classes+"&series="+series+"&sub_serie="+sub_serie,true);

    ajax.onload = function(){

        if(ajax.readyState ==4 && ajax.status==200){
           let  resulte = JSON.parse(ajax.responseText);

            if (resulte !== []) {

                
                let table = document.createElement("table");
                let thead = document.createElement("thead")
                let trol = document.createElement("tr");
                let th1 = document.createElement("th");
                let th2 = document.createElement("th");
                let th3 = document.createElement("th");
                let th4 = document.createElement("th");
                let th5 = document.createElement("th");
                let th6 = document.createElement("th");
                let th7 = document.createElement("th");
                let th8 = document.createElement("th");
                let tbody = document.createElement("tbody");

                body_table.innerHTML = "";

                table.className= "table table-striped  table-hover table-checkable" ;
                table.appendChild(thead);
                table.appendChild(tbody);
                thead.appendChild(trol);
                table.id = "table2";
                $("#table2").dataTable({
                    dom : 'Bfrtip',
                    buttons : [
                        {
                            extend : 'excel',
                            text : 'excel',
                            className : 'btn btn-success my-3 mx-2'
                        }  ,
                        {
                            extend : 'pdf',
                            text : 'PDF',
                            className : 'btn btn-danger my-3 mx-2'
                        }  ,
                        {
                            extend : 'print',
                            text : 'PRINT',
                            className : 'btn btn-info my-3 mx-2'
                        } 
                    ]
                });
                
                console.log(thead);
                trol.appendChild(th1);
                trol.appendChild(th2);
                th2.textContent = "First Name";
                th2.className = "text-center ";
                trol.appendChild(th3);
                th3.textContent = "Last Name";
                th3.className = "text-center ";
                trol.appendChild(th4);
                th4.textContent = "Level";
                th4.className = "text-center";
                trol.appendChild(th5);
                th5.textContent = "Mobile";
                th5.className = "text-center";
                trol.appendChild(th6);
                th6.textContent = "Email";
                th6.className = "text-center ";
                trol.appendChild(th7);
                th7.textContent = "Admission Date";
                th7.className = "text-center ";
                trol.appendChild(th8);
                th8.textContent = "Action";
                th8.className = "text-center ";

                body_table.appendChild(table);

                resulte.forEach(element => {
                   let tr = document.createElement("tr");
                   let img = document.createElement("img");
                   let td1 = document.createElement("td");
                   let td2 = document.createElement("td");
                   let td3 = document.createElement("td");
                   let td4 = document.createElement("td");
                   let td5 = document.createElement("td");
                   let td6 = document.createElement("td");
                   let td7 = document.createElement("td");
                   let td8 = document.createElement("td");
                   let a = document.createElement("a");
                   let btn1 = document.createElement("button");
                   let btn2 = document.createElement("button");
                   let i1 = document.createElement("i");
                   let i2 = document.createElement("i");

                   tr.className = "odd gradeX";
                   td1.className = "patient-img";
                   btn1.className = "btn btn-success btn-xs";
                   btn2.className = "btn btn-danger btn-xs";
                   i1.className = "fa fa-edit";
                   i2.className = "fa fa-trash-o";

                   tr.appendChild(td1);
                   tr.appendChild(td2);
                   tr.appendChild(td3);
                   tr.appendChild(td4);
                   tr.appendChild(td5);
                   tr.appendChild(td6);
                   tr.appendChild(td7);
                   tr.appendChild(td8);
                   td1.appendChild(img);
                   img.src = element.picture;
                   img.alt = "";
                   td2.textContent = element.fname;
                   td3.textContent = element.lname;
                   td4.textContent = element.class_name;
                   td5.textContent = element.tel;
                   td6.appendChild(a);
                   a.href = element.email;
                   a.textContent = element.email
                   td7.textContent = element.register_date;
                   td8.appendChild(btn1);
                   btn1.appendChild(i1);
                   td8.appendChild(btn2);
                   btn2.appendChild(i2);

                   tbody.appendChild(tr);

                });
                
            }
           
        }

    }

    ajax.send();
})


