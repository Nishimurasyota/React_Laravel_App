import {getTasks} from "../api/TaskApi"
import {useQuery} from "react-query";


export const UseTasks = () => {
    return useQuery("tasks", () => getTasks()
    )
}
