class Persona{

    constructor(nom, email, edad, experiencia){
    	this.nom = nom;
    	this.email = email;
    	this.edad = edad;
    	this.experiencia = experiencia;
    }

    informar(){
		return this.nom+", "+this.email+", "+this.edad+", "+this.experiencia;
	}
}