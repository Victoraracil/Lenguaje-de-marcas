class Consejo {
    constructor(titulo = '', valoracion = 0, efectividad = 0, tipo = '', resumen = '', descripcion = '') {
        this._titulo = titulo;
        this._valoracion = valoracion;
        this._efectividad = efectividad;
        this._tipo = tipo;
        this._resumen = resumen;
        this._descripcion = descripcion;
    }

    // Getters
    get titulo() {
        return this._titulo;
    }

    get valoracion() {
        return this._valoracion;
    }

    get efectividad() {
        return this._efectividad;
    }

    get tipo() {
        return this._tipo;
    }

    get resumen() {
        return this._resumen;
    }

    get descripcion() {
        return this._descripcion;
    }

    // Setters
    set titulo(titulo) {
        this._titulo = titulo;
    }

    set valoracion(valoracion) {
        this._valoracion = valoracion;
    }

    set efectividad(efectividad) {
        this._efectividad = efectividad;
    }

    set tipo(tipo) {
        this._tipo = tipo;
    }

    set resumen(resumen) {
        this._resumen = resumen;
    }

    set descripcion(descripcion) {
        this._descripcion = descripcion;
    }
}

// Ejemplo de uso
const consejo = new Consejo('No procrastinar', 5, 4.5, 'Motivacional', 'Evita posponer tareas', 'Es importante gestionar el tiempo para evitar el estrés.');
console.log(consejo.titulo); // No procrastinar
consejo.titulo = 'Planifica tu día';
console.log(consejo.titulo); // Planifica tu día
