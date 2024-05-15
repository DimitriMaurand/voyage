

export type VoyagesProps = {
    id:number
    titre_voyage:string
    Pays:[{
        nom_pays:string
    }]
    ile:[{
        nom_ile:string
    }]
     duree_voyage:number
     prix_voyage:number
    Image: [{
        url_image:string
    }]
    Description_voyage:string
   
}

export type SingleVoyageProps = {
     id:number
    titre_voyage:string
    Pays:[{
        nom_pays:string
    }]
    ile:[{
        nom_ile:string
    }]
     duree_voyage:number
     prix_voyage:number
    Image: [{
        url_image:string
    }]
    Description_voyage:string
}

export type ReservationsProps = {
    message_reservation:string
    user: {
        email:string
        prenom:string
        nom:string
        
    }
   voyage:{
    voyage_id:number
   }
}
