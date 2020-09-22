function Set_actu(a)
{
     parentE = a.parentElement.parentElement;
     titre = parentE.getElementsByTagName("td")[1].innerHTML;
     content = parentE.getElementsByTagName("td")[2].innerHTML;
     document.getElementById("formD").getElementsByTagName("input")[0].value=titre;
     document.getElementById("formD").getElementsByTagName("textarea")[0].value=content;
     document.getElementById("IDs").value = parentE.getElementsByTagName("td")[0].innerHTML;
     
}