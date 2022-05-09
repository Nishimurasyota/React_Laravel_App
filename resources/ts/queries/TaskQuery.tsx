import {getTasks, updateDoneTask, createTask} from "../api/TaskApi"
import {useQuery,useMutation,useQueryClient} from "react-query";
import {toast} from "react-toastify"
import {AxiosError} from "axios"


export const UseTasks = () => {
    return useQuery("tasks", () => getTasks()
    )
}

export const UseUpdateDoneTasks = () => {
const queryClient = useQueryClient();

return useMutation(updateDoneTask,{
    onSuccess: () => {queryClient.invalidateQueries("tasks")},
    onError: () => { toast.error("更新に失敗しました")}
})
}

export const UseCreateTask = () => {
    const queryClient = useQueryClient();

    return useMutation(createTask,{
        onSuccess: () => {
            queryClient.invalidateQueries("tasks")
            toast.success("登録に成功しました")},
        onError: (error: AxiosError) => {
            if(error.response?.data.errors){
                Object.values(error.response?.data.errors).map(
                    (messages: any) => {
                        messages.map((message: string)=>{
                            toast.error(message);
                        })
                    }
                )
            }else{
                toast.error("登録に失敗しました")
            }
        }
    })
    }
