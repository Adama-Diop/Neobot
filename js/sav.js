const faqData = [
  {
    question: "Comment créer mon premier robot ?",
    answer:
      "Connectez-vous à votre compte, cliquez sur Créer un robot puis laissez-vous guider."
  },
  {
    question: "Comment fonctionnent les abonnements Botify ?",
    answer:
      "Vous pouvez changer ou annuler votre abonnement à tout moment."
  },
  {
    question: "Puis-je modifier mon robot après l'avoir créé ?",
    answer:
      'Oui. Depuis la page "Mes robots", cliquez sur Modifier.'
  },
  {
    question: "Quels sont les délais de livraison ?",
    answer:
      "Les délais dépendent de votre pays de livraison."
  },
  {
    question: "Comment réinitialiser mon mot de passe ?",
    answer:
      'Cliquez sur "Mot de passe oublié" depuis la page de connexion.'
  }
];


const faqContainer = document.querySelector("#faq-container");


faqData.forEach((faq) => {

  // Création de l'élément FAQ
  const faqItem = document.createElement("div");
  faqItem.classList.add("faq-item");

  // Création de la question
  const question = document.createElement("button");
  question.classList.add("faq-question");

  question.innerHTML = `
    <span>${faq.question}</span>
    <span class="faq-icon">+</span>
  `;

  // Création de la réponse
  const answer = document.createElement("div");
  answer.classList.add("faq-answer");

  answer.innerHTML = `
    <p>${faq.answer}</p>
  `;

  // Ajout dans le DOM
  faqItem.appendChild(question);
  faqItem.appendChild(answer);

  faqContainer.appendChild(faqItem);


  // Gestion du clic
  question.addEventListener("click", () => {

    const isOpen = answer.style.maxHeight;

    // Fermer toutes les autres FAQ
    document.querySelectorAll(".faq-item").forEach((item) => {

      item.querySelector(".faq-answer").style.maxHeight = null;
      item.querySelector(".faq-icon").textContent = "+";

    });


    // Si celle-ci était fermée, on l'ouvre
    if (!isOpen) {

      answer.style.maxHeight = answer.scrollHeight + "px";

      question.querySelector(".faq-icon").textContent = "−";

    }

  });

});