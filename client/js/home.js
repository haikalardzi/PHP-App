function openPage(pageName,elmnt) {
    var i, tabcontent, tablinks, tabexpand, search, tabright;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tabexpand = document.getElementsByClassName("tabexpand");
    for(i = 0; i < tabexpand.length; i++){
      tabexpand[i].style.backgroundColor = '#eaeaea';
      tabexpand[i].style.color = '#555'
    }
    search = document.getElementsByClassName("search");
    for(i = 0; i < search.length; i++){
      search[i].style.backgroundColor = '#eaeaea';
      search[i].style.color = '#555'
    }
    tabright = document.getElementsByClassName("tabright");
    for(i = 0; i < tabright.length; i++){
      tabright[i].style.backgroundColor = '#eaeaea';
      tabright[i].style.color = '#555'
    }
    tablinks = document.getElementsByClassName("tabbutton");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = '#eaeaea';
      tablinks[i].style.color = '#555';
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = '#3c00a0';
    elmnt.style.color = '#fff';
}

document.getElementById("opened").click();