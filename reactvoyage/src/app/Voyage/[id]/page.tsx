"use client"

import { Footer } from "../../Components/footer/page";
import { Header } from "../../Components/header/page";
import { useRouter } from "next/navigation";
import { useEffect, useState } from "react";
import { SingleVoyageProps} from "@/app/Utils/types";
import { getVoyageById } from "@/app/Services/voyage";
import { insertReservation } from "@/app/Services/voyage";
import toast from "react-hot-toast";


  const Page = ({ params }: { params: { id: any } }) => {
   
    const { push } = useRouter()
    const [voyageData, setVoyagelData] = useState<SingleVoyageProps >()

    useEffect(() => {
        getVoyageById(params.id).then((res) => {
            setVoyagelData(res)
            console.log(res)
        })
    }, [])
    const [nom, setNom] = useState("");
    const [prenom, setPrenom] = useState("");
    const [message_reservation, setmessage_reservation] = useState("");
    const [email, setemail] = useState("");

    function handleSubmit() {
    if(
      !nom ||
      !prenom ||
      !message_reservation ||
      !email 
    ){
      let ReservationsData = {
        nom: nom,
        prenom: prenom,
        message_reservation: message_reservation,
        email: email,
        
      };
       alert("certain champs manque");
    } else {
      let ReservationsData = {
      
        message_reservation:message_reservation,
    user: {
        email:email,
        prenom:prenom,
        nom:nom,
        
    },
    voyage:{
      voyage_id:params.id,
    }
   
      };
            insertReservation(ReservationsData).then((res) => {
                if (res.status === 201) {
                    toast.success('Voyage enregistré')
                    // push('/message_reservation')
                }
              })
    }
  }
  return (
    <main className="min-h-screen">
      <Header></Header>
      {voyageData && (



        <div className="bg-gray-50 ">
          <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div className="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">





              <div className="group relative  bg-white rounded-lg shadow-lg p-4  mb-6 ">
                <h3 className=" text-2xl text-sky-500 text-center font-semibold m-4">{voyageData.Pays[0].nom_pays}</h3>
                <h3 className=" text-2xl text-sky-500 text-center font-semibold m-4">

                  <a href=""
                    className="">  {voyageData.ile[0].nom_ile}

                  </a>
                </h3>
                <div className="relative h-80 w-full overflow-hidden rounded-lg sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1  sm:h-64">
                  <img
                    src={voyageData.Image[0].url_image}
                    alt=""
                    className="h-full w-full object-cover object-center" />
                </div>
                <div className="flex justify-between font-bold m-4">
                  <h4>{voyageData.duree_voyage} Jours</h4>
                  <h4>A partir de {voyageData.prix_voyage}€</h4>
                </div>
                <p className="text-base   text-gray-900 m-4">{voyageData.Description_voyage}</p>
                <div className="bg-gray-100 rounded-lg shadow-lg p-4">
                  <div className=" justify-center items-center mt-16">
                    <h3 className=" text-2xl text-sky-500 text-center font-semibold m-4">  contactez nous</h3>
                    <p className="text-base text-center  text-gray-900 m-4">Pour plus en renseignement ou pour finaliser une réservation</p>
                  </div>
                  <div className="mx-auto  max-w-xl sm:mt-20">
                    <div className="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                      <div>
                        <label htmlFor="Nom" className="block text-sm font-semibold leading-6 text-gray-900">
                          Nom
                        </label>
                        <div className="mt-2.5">
                          <input
                            type="text"
                            name="Nom"
                            id="Nom"
                            onChange={(e) => setNom(e.target.value)}
                            className="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      <div>
                        <label htmlFor="Prenom" className="block text-sm font-semibold leading-6 text-gray-900">
                          Prénom
                        </label>
                        <div className="mt-2.5">
                          <input
                            type="text"
                            name="Prenom"
                            id="Prenom"
                            onChange={(e) => setPrenom(e.target.value)}
                            className="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      {/* <div>
                        <label htmlFor="Telephone" className="block text-sm font-semibold leading-6 text-gray-900">
                          Téléphone
                        </label>
                        {/* <div className="mt-2.5">
                          <input
                            type="text"
                            name="Telephone"
                            id="Telephone"
                            onChange={(e) => setemail(e.target.value)}

                            className="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div> */} 
                      <div>
                        <label htmlFor="email" className="block text-sm font-semibold leading-6 text-gray-900">
                          E mail
                        </label>
                        <div className="mt-2.5">
                          <input
                            type="email"
                            name="email"
                            id="email"
                            onChange={(e) => setemail(e.target.value)}
                            className="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        </div>
                      </div>
                      <div className="sm:col-span-2">
                        <label htmlFor="message" className="block text-sm font-semibold leading-6 text-gray-900">
                          Message
                        </label>
                        <div className="mt-2.5">
                          <textarea
                            name="message"
                            id="message"
                            rows={4}
                            
                            onChange={(e) => setmessage_reservation(e.target.value)}

                            className="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            defaultValue={''} />
                        </div>
                      </div>


                    </div>
                    <div className="mt-10">
                      <button
                        type="submit"
                        className="block w-full rounded-md bg-sky-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                       onClick={() => handleSubmit()}
                      >
                       
                        Envoyer
                      </button>
                    </div>
                  </div>
                  <div className="mt-10">
                      <button
                        onClick={() => {
                                        push(`/`)
                                    }}
                        className="block w-48 rounded-md bg-sky-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                      >
                       Retour
                      </button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>



      )}
     <Footer></Footer> 
    </main>
  );
  
}

export default Page


