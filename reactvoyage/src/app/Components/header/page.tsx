import React from 'react'

export const Header = () => {
    return (
        <header className='bg-white'>
            
            <div className=' w-full bg-white'>
                <div className='h24 flex items-center '>
                    <img className='w-24 h-24 ' src="/Travel.png" alt="" />
                    <h1 className='w-full text-5xl text-sky-500 font-bold text-center'>Destination Pacifique</h1>
                </div>
                
                <img className='object-cover h-96 w-full' src="https://images.unsplash.com/photo-1589197331516-4d84b72ebde3?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" />
            </div>
        </header>
    )
}

