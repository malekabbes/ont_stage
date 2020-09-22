
     /* METHOD 1
     
     function Set_table(a)
        {
            id = a.id.replace("user", "");
              name = document.getElementById("row"+id).getElementsByTagName("td")[1].innerHTML;
            email = document.getElementById("row"+id).getElementsByTagName("td")[2].innerHTML;
            poste = document.getElementById("row"+id).getElementsByTagName("td")[3].innerHTML;
            congé = document.getElementById("row"+id).getElementsByTagName("td")[4].innerHTML;
            document.getElementById("formD").getElementsByTagName("input")[0].value=name;
            document.getElementById("formD").getElementsByTagName("input")[1].value=email;
            document.getElementById("formD").getElementsByTagName("input")[2].value=poste;
            document.getElementById("formD").getElementsByTagName("input")[3].value=congé;
        }
        METHOOD 2 
    */ 
       function Set_table(a)
       {
            parentE = a.parentElement.parentElement;
            name = parentE.getElementsByTagName("td")[1].innerHTML;
            email = parentE.getElementsByTagName("td")[2].innerHTML;
            congé = parentE.getElementsByTagName("td")[4].innerHTML;
            document.getElementById("formD").getElementsByTagName("input")[0].value=name;
            document.getElementById("formD").getElementsByTagName("input")[1].value=email;
            document.getElementById("formD").getElementsByTagName("input")[3].value=congé;
            // "rowid" and "userid"  pas necessaire pour ce cas
            document.getElementById("IDs").value=parentE.getElementsByTagName("td")[0].innerHTML;
          }