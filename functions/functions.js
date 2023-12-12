/**
 * Vérifie qu'une chaine correspond à une adresse email.
 *
 * @param email
 * @returns {boolean}
 */
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

/**
 * Vérifie que la chaine correspond à un numéro de téléphone.
 *
 * @param phone
 * @returns {boolean}
 */
function validatePhone(phone) {
  var regex =
    /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
  return regex.test(phone);
}

/**
 * Vérifie que le mot de passe contient :
 * <ul>
 *   <li>at least one digit</li>
 *   <li>at least one lower case</li>
 *   <li>at least one upper case</li>
 *   <li>at least 6 from the mentioned characters</li>
 * </ul>
 *
 * @param password
 * @returns {boolean}
 */
function validatePassword(password) {
  var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{6,}$/;
  return regex.test(password);
}

/**
 * Affiche dans un composant le fichier d'un input file:
 *
 * @param input
 * @param input
 * @returns {Exécute le script}
 */
function VoirFichier(input, file_id) {
  var file = $("input[type=file]").get(0).files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function () {
      $(file_id).attr("src", reader.result);
    };
    reader.readAsDataURL(file);
  }
}
/**
 * Affiche dans un composant le fichier d'un input file:
 *
 * @param input
 * @param input
 * @returns {Exécute le script}
 */
function VoirFichier2(input, file_id) {
  var file = $("input[type=file]").get(0).files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function () {
      $(file_id).attr("src", reader.result);
    };
    reader.readAsDataURL(file);
  }
}

/**
 * Retourne une suite de nombre aléatoire avec un maximum défini:
 *
 * @param max
 * @returns {double}
 */
function NombreAleatoire(max) {
  return Math.floor(Math.random() * max);
}

/**
 * Méthode pour bloquer le control lorsque le nombre n'est pas numérique
 *
 * @param frap
 * @returns {boolean}
 */
function NAN(frap) {
  var array = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
  if (frap in array) {
    return true;
  } else {
    return false;
  }
}

/**
 * Vérification des images
 *
 * @param image_id
 * @returns {boolean}
 */
function VerificationsImages(image_id) {
  var uploadpath = $(image_id).attr("src");
  var fileExtension = uploadpath.substring(
    uploadpath.lastIndexOf(".") + 1,
    uploadpath.length
  );
  var verfilextension = false;
  if (
    uploadpath.includes("data:image/png;base64,") === true ||
    uploadpath.includes("data:image/jpg;base64,") === true ||
    uploadpath.includes("data:image/jpeg;base64,") === true ||
    uploadpath.includes("data:image/bmp;base64,") === true
  ) {
    verfilextension = true;
  } else {
    verfilextension = false;
  }

  if (
    verfilextension === true ||
    fileExtension === "png" ||
    fileExtension === "jpg" ||
    fileExtension === "jpeg" ||
    fileExtension === "bmp"
  ) {
    return true;
  } else {
    return false;
  }
}
