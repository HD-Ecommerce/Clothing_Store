const modal = (function () {
  const $ = document.querySelector.bind(document);
  const $$ = document.querySelectorAll.bind(document);

  function Modal() {
    const modal = $(".modal");
    const closeBtn = $(".modal-close");
    const modalContent = $(".modal-content");
    const login = $(".login");
    const register = $(".register");
    const btnLogins = $$(".login-btn");
    const btnRegisters = $$(".register-btn");
    const userContainer = $(".user__container");

    modal.onclick = () => {
      modal.classList.remove("active");
    };

    closeBtn.onclick = () => {
      modal.classList.remove("active");
    };

    modalContent.onclick = (e) => {
      e.stopPropagation();
    };

    btnLogins.forEach((btn) => {
      btn.onclick = (e) => {
        e.preventDefault();
        modal.classList.add("active");
        login.classList.add("active");
        register.classList.remove("active");
        userContainer.classList.toggle("active");
      };
    });
    btnRegisters.forEach((btn) => {
      btn.onclick = (e) => {
        e.preventDefault();
        modal.classList.add("active");
        login.classList.remove("active");
        register.classList.add("active");
        userContainer.classList.toggle("active");
      };
    });
  }

  function Login_Register() {
    const login = $(".login");
    const register = $(".register");
    const btnLogin = $(".register__login");
    const btnRegister = $(".login__register");

    btnLogin.onclick = (e) => {
      e.preventDefault();
      login.classList.add("active");
      register.classList.remove("active");
    };

    btnRegister.onclick = (e) => {
      e.preventDefault();
      login.classList.remove("active");
      register.classList.add("active");
    };
  }

  function changeType() {
    const inputs = $$(".input-password");

    inputs.forEach((input) => {
      input.type = input.type === "password" ? "text" : "password";
    });
  }

  function togglePassword() {
    const toggleBtns = $$(".toggle-password");

    toggleBtns.forEach((btn) => {
      btn.onclick = () => {
        changeType();
        btn.classList.toggle("bx-show-alt");
        btn.classList.toggle("bx-hide");
      };
    });
  }

  return {
    togglePassword,
    Login_Register,
    Modal,
  };
})();

export { modal };
