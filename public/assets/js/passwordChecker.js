const passwordInputs = document.querySelectorAll(".check-password");

const requirementHTML = `
    <p>Password must contain</p>
    <ul class="requirement-list">
        <li>
            <i class="fa-solid fa-xmark"></i>
            <span>${passwordRequirements.minLength}</span>
        </li>
        <li>
            <i class="fa-solid fa-xmark"></i>
            <span>${passwordRequirements.number}</span>
        </li>
        <li>
            <i class="fa-solid fa-xmark"></i>
            <span>${passwordRequirements.lowercase}</span>
        </li>
        <li>
            <i class="fa-solid fa-xmark"></i>
            <span>${passwordRequirements.special}</span>
        </li>
        <li>
            <i class="fa-solid fa-xmark"></i>
            <span>${passwordRequirements.uppercase}</span>
        </li>
    </ul>
`;

// Definir las reglas de validación aquí
const requirements = [
    { regex: /.{8,}/, index: 0 }, // Mínimo de 8 caracteres
    { regex: /[0-9]/, index: 1 }, // Al menos un número
    { regex: /[a-z]/, index: 2 }, // Al menos una letra minúscula
    { regex: /[^A-Za-z0-9]/, index: 3 }, // Al menos un símbolo especial
    { regex: /[A-Z]/, index: 4 }, // Al menos una letra mayúscula
];

passwordInputs.forEach((input) => {
    const passwordValidator = input.parentElement.querySelector(".password-validator");

    input.addEventListener("focus", () => {
        // Solo insertar el contenido si está vacío
        if (!passwordValidator.innerHTML.trim()) {
            passwordValidator.innerHTML = requirementHTML; // Inserta el contenido
        }
        passwordValidator.classList.remove("hidden"); // Muestra la lista de requisitos
    });

    input.addEventListener("blur", () => {
        passwordValidator.classList.add("hidden"); // Oculta la lista de requisitos al salir
    });

    input.addEventListener("keyup", (e) => {
        const requirementList = passwordValidator.querySelectorAll(".requirement-list li");
        
        requirements.forEach((item) => {
            // Check if the password matches the requirement regex
            const isValid = item.regex.test(e.target.value);
            const requirementItem = requirementList[item.index];

            // Verifica si el elemento existe antes de acceder a su classList
            if (requirementItem) {
                if (isValid) {
                    requirementItem.classList.add("valid");
                    requirementItem.firstElementChild.className = "fa-solid fa-check";
                } else {
                    requirementItem.classList.remove("valid");
                    requirementItem.firstElementChild.className = "fa-solid fa-xmark";
                }
            }
        });
    });
});
