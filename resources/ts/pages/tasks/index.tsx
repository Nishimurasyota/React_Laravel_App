import React,{useEffect, useState} from "react";
import {TaskInput} from "../tasks/taskInput"
import {TaskList} from "../tasks/taskList"
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
