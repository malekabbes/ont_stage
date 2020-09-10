var password = document.getElementById("pass");
password.addEventListener('keyup', function() {

  var pwd = password.value

  // Reset if password length is zero
  if (pwd.length === 0) {
    document.getElementById("proglabel").innerHTML = "";
    document.getElementById("progress").value = "0";
    return;
  }

  // Check progress
  var prog = [/[$@$!%*#?&]/, /[A-Z]/, /[0-9]/, /[a-z]/]
    .reduce((memo, test) => memo + test.test(pwd), 0);

  // Length must be at least 8 chars
  if(prog > 2 && pwd.length > 7){
    prog++;
  }

  // Display it
  var progress = "";
  var strength = "";
  var color = "";
  var border ="";
  switch (prog) {
    case 0:
    case 1:
    case 2:
      strength = "Votre mot de passe est faible";
      progress = "25";
      color = "red";
      border ="1px solid #f825258f";
      break;
    case 3:
      strength = "Votre mot de passe est moyen "
      progress = "50";
      color = "rgba(255, 136, 0, 0.918)";
      border ="1px solid rgba(255, 136, 0, 0.918)";
      break;
    case 4:
      strength = "Votre mot de passe est bon ! ";
      progress = "70"; 
      color = "rgba(34, 228, 92, 0.918)";
      border ="1px solid rgba(34, 228, 92, 0.918)";
      break;
    case 5:
      strength = "Votre mot de passe est fort !";
      progress = "100";
      color = "green";
      border ="1px solid green";
      break;
  }
  document.getElementById("proglabel").innerHTML = strength;
  document.getElementById("progress").value = progress;
  document.getElementById("proglabel").style.color = color;
  document.getElementById("proglabel").style.border = border;
    $('#submit').prop('disabled',false);
});