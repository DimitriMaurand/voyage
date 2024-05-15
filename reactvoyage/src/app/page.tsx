
"use client"
import { useRouter } from "next/navigation";
import { Footer } from "./Components/footer/page";
import { Header } from "./Components/header/page";
import { getAllVoyage } from './Services/voyage';
import { useEffect, useState } from "react";
import { VoyagesProps } from "./Utils/types";
import page from "./Voyage/[id]/page";


const Voyages = ()  =>{
 
    const { push } = useRouter()
  const [voyagesList, setVoyagesList] = useState <VoyagesProps []>([])

    useEffect(() => {
        getAllVoyage().then((res: any) => {
            setVoyagesList(res.data)
        })
        
 

    }, [])






  return (
    <main className="min-h-screen">
<Header></Header>
     
     
    <div className="bg-gray-50 ">
      <div className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div className="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
          <h2 className="text-4xl  text-sky-500 font-semibold text-center">Nos voyagesList</h2>

          <div className="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
            
            {/* première carte */}



              {/* <div  className="group relative  bg-white rounded-lg shadow-lg p-4 transform hover:scale-105 transition-transform mb-6">
                <h3 className=" text-2xl text-sky-500 text-center font-semibold m-4">Polynésie Française</h3>
                <h3 className=" text-2xl text-sky-500 text-center font-semibold m-4">

                  <a href=""
                    className="" > Bora Bora
                    
                  </a>
                </h3>
                <div className="relative h-80 w-full overflow-hidden rounded-lg sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1  sm:h-64">
                  <img
                    src="https://images.unsplash.com/photo-1580725869538-9b164c27c44f?q=80&w=2532&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt=""
                    className="h-full w-full object-cover object-center"
                  />
                </div>
                <div className="flex justify-between font-bold m-4">
                  <h4>6 Jours</h4>
                  <h4>A partir de 3 000€</h4>
                </div>
                <p className="text-base   text-gray-900 m-4">Tahiti et ses îles est la destination idéale pour un séjour romantique et inoubliable ! Des eaux cristallines aux nuances de bleus, des paysages à couper le souffle, une population accueillante, un cadre paradisiaque pour des vacances de rêve.  Commencez par Tahiti, où vous apprécierez la tranquillité et la sérénité qui règne sur la côte Est de l’île, poursuivez en beauté sur Bora Bora, la Perle du Pacifique et terminez par une expérience authentique et sophistiquée, en bungalow sur pilotis à l’hôtel Le Tahaa by Pearl Resorts, dans un environnement préservé !</p>
                <div className="flex justify-center items-center">
                  <button className="bg-sky-500 text-white rounded-lg shadow-lg px-4 py-2 group-hover:opacity-75 "
                  onClick={()=>{
        push("/Voyage")
      }}>Découvrir plus</button>
                </div>
              </div> */}
            
            {/* génératrice carte */}
            {
              voyagesList && voyagesList.map((voyageInfo) => {
                return(
   <div  className="group relative  bg-white rounded-lg shadow-lg p-4 transform hover:scale-105 transition-transform mb-6 cursor-pointer"
               key={voyageInfo.id} onClick={() => {
                                        push(`/Voyage/${voyageInfo.id}`)
                                    }}>
                
                 <h3 className=" text-2xl text-sky-500 text-center font-semibold m-4">{voyageInfo.Pays[0].nom_pays}</h3>
                <h3 className=" text-2xl text-sky-500 text-center font-semibold m-4">
                  
                    {voyageInfo.ile[0].nom_ile}
                    
                  
                </h3>
                <div className="relative h-80 w-full overflow-hidden rounded-lg sm:aspect-h-1 sm:aspect-w-2 lg:aspect-h-1 lg:aspect-w-1  sm:h-64">
                  <img
                    src={voyageInfo.Image[0].url_image}
                    alt=""
                    className="h-full w-full object-cover object-center"
                  />
                </div>
                <div className="flex justify-between font-bold m-4">
                  <h4>{voyageInfo.duree_voyage} jours</h4>
                  <h4>A partir de {voyageInfo.prix_voyage}€</h4>
                </div>
                <p className="text-base   text-gray-900 m-4">{voyageInfo.Description_voyage}</p>
                <div className="flex justify-center items-center">
                  <button className="bg-sky-500 text-white rounded-lg shadow-lg px-4 py-2 group-hover:opacity-75 ">Découvrir plus</button>
                </div>
              </div>
                )
              })
            }
            
          </div>
        </div>
      </div>
    </div>
  

     <Footer></Footer>
    </main>
  );
}

export default Voyages