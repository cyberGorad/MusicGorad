/*navbar__animated__padding*/
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "30 9px";
    document.getElementById("logo").style.fontSize = "20px";
    document.getElementById("navbar").style.backgroundColor = "white";
    document.getElementById("to__top").style.visibility = "visible";/*boutton _top*/
    document.getElementById("opac__").style.opacity = "0.9";/*boutton _top*/
    document.getElementById("to__top").style.opacity = "1";


  } else {
    document.getElementById("navbar").style.padding = "35px 10px";
    document.getElementById("logo").style.fontSize = "25px";
    document.getElementById("navbar").style.backgroundColor = "rgba(247, 241, 241, 0.1)";
    document.getElementById("to__top").style.visibility = "hidden";
    document.getElementById("opac__").style.opacity = "1";
    document.getElementById("to__top").style.opacity = "0.1";

  }
}
/****************************************************************************** */
$(window).scroll(function() {
  var element = $("#premier");
  var elementPos = element.offset().top;
  var scrollPos = $(window).scrollTop();
  var windowHeight = $(window).height();
  
  // Vérifie si le haut de l'élément est visible dans la fenêtre
  if (scrollPos > elementPos - windowHeight) {
    element.addClass("w3-animate-left");
  } else {
    element.removeClass("w3-animate-left");
  }
});

$(window).scroll(function() {
  var element = $("#deuxieme");
  var elementPos = element.offset().top;
  var scrollPos = $(window).scrollTop();
  var windowHeight = $(window).height();
  
  // Vérifie si le haut de l'élément est visible dans la fenêtre
  if (scrollPos > elementPos - windowHeight) {
    element.addClass("w3-animate-top");
  } else {
    element.removeClass("w3-animate-top");
  }
});



$(window).scroll(function() {
  var element = $("#troisieme");
  var elementPos = element.offset().top;
  var scrollPos = $(window).scrollTop();
  var windowHeight = $(window).height();
  
  // Vérifie si le haut de l'élément est visible dans la fenêtre
  if (scrollPos > elementPos - windowHeight) {
    element.addClass("w3-animate-right");
  } else {
    element.removeClass("w3-animate-right");
  }
});



  // JavaScript pour masquer le spinner apr�s le chargement de la page
  document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
      document.querySelector('.spinner-container').style.display = 'none';
      document.body.style.overflow = 'visible'; /* R�tablir le d�filement de la page */
    }, 2000); // Simule un chargement de 2 secondes (vous pouvez ajuster cette valeur)
  });


  /*auto typer*/
  document.addEventListener('DOMContentLoaded', function () {
    const texts = ["Image", "Applications","Music"];
    const typingSpeed = 200; // Vitesse de frappe (en millisecondes)
    const eraseSpeed = 50; // Vitesse d'effacement (en millisecondes)
    const blinkSpeed = 500; // Vitesse de clignotement (en millisecondes)
    let currentIndex = 0;

    function typeText() {
      const targetElement = document.getElementById('auto-typing-text');
      targetElement.classList.toggle('blink'); // Activer/d�sactiver la classe de clignotement

      if (targetElement.textContent === texts[currentIndex]) {
        // Attendre avant d'effacer le texte
        setTimeout(eraseText, 2000);
      } else {
        // Continuer � �crire le texte
        setTimeout(() => {
          targetElement.textContent = texts[currentIndex].substring(0, targetElement.textContent.length + 1);
          typeText();
        }, typingSpeed);
      }
    }

    function eraseText() {
      const targetElement = document.getElementById('auto-typing-text');
      const currentText = targetElement.textContent;
      if (currentText.length > 0) {
        targetElement.textContent = currentText.slice(0, -1);
        setTimeout(eraseText, eraseSpeed);
      } else {
        // Passer au texte suivant apr�s l'effacement
        currentIndex = (currentIndex + 1) % texts.length;
        // Commencer � �crire le prochain texte
        setTimeout(typeText, typingSpeed);
      }
    }

    // D�marre l'effet de frappe automatique apr�s un d�lai
    setTimeout(typeText, 1000);
  });


  /*Scroll TOP*/
  window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    document.getElementById("transform").style.backgroundcolor =  "rgba(0,0,0,0)";
  } else {
    document.getElementById("transform").style.backgroundColor =  "rgba(0,0,0,0.3)";
  }
}


function updateCounter() {
  const counterElement = document.getElementById('counter');
  let count = parseInt(counterElement.innerText, 10);

  // V�rifier si le compteur est inf�rieur � 1000
  if (count < 500) {
    count++;
    counterElement.innerText = count;
    // Mettre � jour le compteur toutes les 100 millisecondes
    setTimeout(updateCounter, 3);
  }
}

// Fonction pour v�rifier si l'�l�ment est visible � l'�cran
function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Fonction pour g�rer l'�v�nement de d�filement
function handleScroll() {
  const counterElement = document.getElementById('counter');
  
  // V�rifier si l'�l�ment est dans la vue
  if (isElementInViewport(counterElement)) {
    // D�sactiver l'�couteur de d�filement une fois que l'�l�ment est dans la vue
    window.removeEventListener('scroll', handleScroll);
    // Commencer le compteur
    updateCounter();
  }
}

// Ajouter un �couteur d'�v�nement de d�filement
window.addEventListener('scroll', handleScroll);













document.getElementById('logoutButton').addEventListener('click', function() {
  // Effectuer une requête HTTP GET vers votre script PHP de déconnexion
  fetch('logout.php')
  .then(response => {
      // Vérifier si la requête a réussi (statut HTTP 200)
      if (response.ok) {
          // Rediriger l'utilisateur vers la page de connexion après la déconnexion
          window.location.href = 'login.html';
      } else {
          // Gérer les erreurs si la requête échoue
          console.error('Erreur lors de la déconnexion : ' + response.statusText);
      }
  })
  .catch(error => {
      console.error('Erreur lors de la déconnexion : ', error);
  });
});




