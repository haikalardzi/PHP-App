function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.backgroundColor = '#eaeaea';
      tablinks[i].style.color = '#555'
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = '#3c00a0';
    elmnt.style.color = '#fff'
}

document.getElementById("opened").click();