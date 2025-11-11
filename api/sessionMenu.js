document.addEventListener("DOMContentLoaded", async () => {
  try {
    // --- Detectar automáticamente la carpeta raíz del proyecto ---
    const pathParts = window.location.pathname.split("/").filter(Boolean);
    // Busca la carpeta que contiene "api" o "views" y toma la anterior como raíz del proyecto
    let projectRoot = "";
    if (pathParts.includes("api")) {
      projectRoot = `/${pathParts[pathParts.indexOf("api") - 1]}`;
    } else if (pathParts.includes("views")) {
      projectRoot = `/${pathParts[pathParts.indexOf("views") - 1]}`;
    } else {
      projectRoot = pathParts.length > 0 ? `/${pathParts[0]}` : "";
    }

    const baseURL = `${window.location.origin}${projectRoot}`;

    // --- Llamar al backend para comprobar sesión ---
    const response = await fetch(`${baseURL}/api/checkSession.php`, { cache: "no-store" });
    const data = await response.json();

    const userMenu = document.getElementById("userMenu");
    if (!userMenu) return;

    // --- Construcción del menú ---
    if (data.logged) {
      userMenu.innerHTML = `
        <div class="dropdown">
          <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="${baseURL}/src/user-circle.svg" alt="Usuario">
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><span class="dropdown-item-text">👋 ${data.usuario}</span></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="${baseURL}/views/usuarios/logout.php">Cerrar sesión</a></li>
          </ul>
        </div>
      `;
    } else {
      userMenu.innerHTML = `
        <div class="dropdown">
          <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="${baseURL}/src/user-circle.svg" alt="Usuario">
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="${baseURL}/views/usuarios/iniciarSesion.html">Iniciar sesión</a></li>
          </ul>
        </div>
      `;
    }
  } catch (error) {
    console.error("Error al verificar sesión:", error);
  }
});