import React from "react";
import {Router} from "./Route"
import { QueryClient , QueryClientProvider } from "react-query"

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
        </QueryClientProvider>
    )
}
