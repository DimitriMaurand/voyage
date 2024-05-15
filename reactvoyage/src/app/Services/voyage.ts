import axios from 'axios'
import { ReservationsProps, VoyagesProps } from '../Utils/types';

export async function getAllVoyage() {
    let axiosConfig = {
        headers: {
            'content-type': 'application/json',
        },
    };
    let url = `${process.env.NEXT_PUBLIC_API_URL}api/voyages`;
    return axios.get(url, axiosConfig).then((res) => {
        return res;
    })
};

export async function getVoyageById(id: any) {
    let axiosConfig = {
        headers: {
            'content-type': 'application/json',
        },
    };
    let url = `${process.env.NEXT_PUBLIC_API_URL}api/voyage/${id}`;

    return axios.get(url, axiosConfig).then((res) => {
        return res.data;
    })
};

export async function insertReservation(ReservationsProps: ReservationsProps) {
  let url = `${process.env.NEXT_PUBLIC_API_URL}api/reservation/new`;

  let axiosConfig = {
    headers: {
      'content-type': 'application/json',
      
    },
  };
  return axios
    .post(
      url,
      {
        nom: ReservationsProps.user.nom,
        prenom: ReservationsProps.user.prenom,
        email: ReservationsProps.user.email,
        message_reservation: ReservationsProps.message_reservation,
        id:ReservationsProps.voyage.voyage_id
        
        
      },
      axiosConfig
    )
    .then((res) => {
      return res;
    });
}

