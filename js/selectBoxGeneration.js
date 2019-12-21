function createSelectBox(list, selectboxId){
  for(var i = 0; i < list.length; i++){
    let select = document.getElementById(selectboxId);
    let option = document.createElement("option");
    option.text = list[i].val1;
    option.value = list[i].val1;
    option.name = list[i].val2;
    console.log(selectboxId);
    // console.log(option.value + "," + option.text);
    // select.appendChild(option);
    select.appendChild(option);
  }
};
