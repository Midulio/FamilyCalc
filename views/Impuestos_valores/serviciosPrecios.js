// streamingPrices.js - Finalizado: 21% IVA + 30% Percepción para internacionales, 0% para nacionales.

// Objeto que define los porcentajes de impuestos.
// Esto facilita la modificación si los porcentajes cambian.
const IMPUESTOS_AR_CONFIG = {
    IVA: 0.21,              // 21% de Impuesto al Valor Agregado
    IMPUESTO_PAIS: 0.00,    // 0% - Impuesto PAIS
    PERCEPCION_GANANCIAS: 0.30, // 30% de Percepción de Ganancias/Bienes Personales (RG 4815/5232 unificada)
    PERCEPCION_BIENES_PERSONALES: 0.00, // 0% - Actualmente incluida en la de Ganancias o no aplicada
    IIBB_PROVINCIAL: 0.00,  // 0% - Impuesto a los Ingresos Brutos (variable por provincia, no incluido por defecto)

    // Función para calcular el total de impuestos para servicios internacionales
    getTotalImpuestosInternacionales: function() {
        return this.IVA + this.IMPUESTO_PAIS + this.PERCEPCION_GANANCIAS + this.PERCEPCION_BIENES_PERSONALES + this.IIBB_PROVINCIAL;
    },
    // Función para calcular el total de impuestos para servicios nacionales
    // Ahora retorna 0, ya que los precios base de nacionales ya incluirían todo o no se aplican impuestos adicionales.
    getTotalImpuestosNacionales: function() {
        return 0;
    }
};

// Objeto que contiene todos los servicios y sus planes/precios base en ARS
const streamingServicesPrices = {
    "Netflix": {
        "basico": 7199,
        "estandar": 11999,
        "premium": 15999
    },
    "Prime Video": {
        "estandar": 6499
    },
    "YouTube Premium": {
        "lite": 2199,
        "individual": 3399,
        "familiar": 6799
    },
    "Mercado Libre": { // Marcado como Nacional, no se aplicarán impuestos adicionales.
        "meli+ esencial": 3490,
        "meli+ total": 8990,
        "Nivel 6 + Disney+": 7999,
        "Nivel 6 + paramount+": 9119,
        "Nivel 6 + VIX Premium": 10799,
        "Nivel 6 + Disney+ + HBO MAX": 13581,
        "Nivel 6 TODOS": 17500
    },
    "HBO MAX": {
        "mensual_basico": 5690,
        "mensual_estandar": 7290,
        "mensual_platino": 8790,
        "anual_basico": 49590,
        "anual_estandar": 61290,
        "anual_platino": 72890
    },
    "Disney+": {
        "mensual_estandar_con_anuncios": 9999,
        "mensual_estandar": 12299,
        "mensual_premium": 18399,
        "anual_estandar": 103299,
        "anual_premium": 154499
    },
    "Apple TV+": {
        "individual": 10651
    }
    // Puedes agregar más servicios aquí en el futuro
};

/**
 * Calcula el precio final de un servicio aplicando los impuestos de Argentina.
 * Utiliza la configuración de impuestos global para flexibilidad.
 * @param {string} serviceName - El nombre del servicio (ej: "Netflix").
 * @param {string} planName - El nombre del plan (ej: "basico").
 * @returns {object|null} Un objeto con { base: precioBase, conImpuestos: precioConImpuestos }
 * o null si el servicio/plan no se encuentra.
 */
function getServicePrice(serviceName, planName) {
    const service = streamingServicesPrices[serviceName];

    if (!service) {
        console.warn(`Servicio "${serviceName}" no encontrado.`);
        return null;
    }

    const basePrice = service[planName];

    if (basePrice === undefined) {
        console.warn(`Plan "${planName}" no encontrado para el servicio "${serviceName}".`);
        return null;
    }

    let priceWithTaxes = basePrice;
    let totalTaxRate = 0;

    // Lógica para aplicar impuestos según si es nacional o internacional
    // Hemos establecido que "Mercado Libre" es el servicio nacional de referencia para esta lógica.
    // Si tienes otros servicios nacionales, deberías añadirlos a esta condición.
    const isNationalService = (serviceName === "Mercado Libre"); // Agrega más si es necesario: || serviceName === "Otro Servicio Nacional"

    if (isNationalService) {
        totalTaxRate = IMPUESTOS_AR_CONFIG.getTotalImpuestosNacionales(); // Esto retorna 0
    } else {
        totalTaxRate = IMPUESTOS_AR_CONFIG.getTotalImpuestosInternacionales(); // 21% IVA + 30% Percepción = 51%
    }

    priceWithTaxes = basePrice * (1 + totalTaxRate);

    // Formatear a dos decimales y asegurarse de que es un número
    priceWithTaxes = parseFloat(priceWithTaxes.toFixed(2));

    return {
        base: basePrice,
        conImpuestos: priceWithTaxes,
        porcentajeImpuestosAplicado: (totalTaxRate * 100).toFixed(2) + '%'
    };
}



console.log("--- Precios de Netflix ---");
let netflixBasico = getServicePrice("Netflix", "basico");
if (netflixBasico) {
    console.log(`Netflix Básico: Base $${netflixBasico.base.toLocaleString('es-AR')}, Con Impuestos $${netflixBasico.conImpuestos.toLocaleString('es-AR')} (${netflixBasico.porcentajeImpuestosAplicado})`);
}

console.log("\n--- Precios de Prime Video ---");
let primeEstandar = getServicePrice("Prime Video", "estandar");
if (primeEstandar) {
    console.log(`Prime Video Estándar: Base $${primeEstandar.base.toLocaleString('es-AR')}, Con Impuestos $${primeEstandar.conImpuestos.toLocaleString('es-AR')} (${primeEstandar.porcentajeImpuestosAplicado})`);
}

console.log("\n--- Precios de Mercado Libre ---");
let meliEsencial = getServicePrice("Mercado Libre", "meli+ esencial");
if (meliEsencial) {
    console.log(`Mercado Libre Meli+ Esencial: Base $${meliEsencial.base.toLocaleString('es-AR')}, Con Impuestos $${meliEsencial.conImpuestos.toLocaleString('es-AR')} (${meliEsencial.porcentajeImpuestosAplicado})`);
}

/*
console.log("\n--- Prueba de un servicio no existente ---");
let servicioInexistente = getServicePrice("Un Servicio Ficticio", "plan_xyz");
*/