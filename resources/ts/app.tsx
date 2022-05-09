import React from "react";
import {Router} from "./Route"
import { QueryClient , QueryClientProvider } from "react-query"
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';


export const App: React.VFC = () => {
    const queryClient = new QueryClient({
        defaultOptions:{
            queries:{
                retry:false
            },
            mutations:{
                retry:false
            }
        }
    });
    return (
        <QueryClientProvider client={queryClient}>
            <Router />
            <ToastContainer hideProgressBar={true}/>
        </QueryClientProvider>
    )
}
