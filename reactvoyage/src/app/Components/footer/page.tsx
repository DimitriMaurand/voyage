import React from 'react'
import { FaFacebook } from "react-icons/fa";
import { FaInstagramSquare } from "react-icons/fa";

import { AiFillTwitterCircle } from "react-icons/ai";

export const Footer = () => {
    return (
        
                <footer className='bg-sky-500 flex h-32'>
                    <div text-white className='text-white flex flex-col p-4'>
                        <a href="">Mentions légales</a>
                        <a href="">Aide & FAQ</a>
                        <a href="">Partenaires</a>
                    </div>
                    <div className='text-white flex flex-col p-4'>
                       <FaFacebook className='m-1 '/>
                       <FaInstagramSquare className='m-1' />
                       <AiFillTwitterCircle className='m-1' />
                       
                    </div>
                </footer>
            
    )
}
