import React,{useEffect, useState} from "react";
import {TaskInput} from "./components/taskInput"
import {TaskList} from "./components/taskList"
export const TaskPage: React.FC = () => {

    // const [tasks,setTasks] = useState<Task[]>([]);

    // const getTasks = async () => {
    //     const datas = await axios.get<Task[]>("api/tasks")
    //     const {data} = datas
    //     setTasks(data);
    // }

    // useEffect(()=>{
    //     getTasks();
    // })

    return (
        <>
            <TaskInput />
            <TaskList />
        </>
    )
}
