import {getTasks, updateDoneTask} from "../api/TaskApi"
import {useQuery,useMutation,useQueryClient} from "react-query";
import {toast} from "react-toastify"


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
