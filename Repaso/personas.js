class Persona{

    constructor(nom, email, edad, experiencia){
        this.nom = nom;
        this.email = email;
        this.edad = edad;
        this.experiencia = experiencia;
    }

    setNom(nom){
        this.nom = nom;
    }

    setEmail(email){
        this.email = email;
    }

    setEdad(edad){
        this.edad = edad;
    }

    setExp(exp){
        this.experiencia = exp;
    }

    getNom(){
        return this.nom;
    }

    getEmail(){
        return this.email;
    }

    getEdad(){
        return this.edad;
    }

    getExp(){
        return this.experiencia;
    }
}