import React from "react";
import {Task} from "../../../types/Task"
import {UseUpdateDoneTasks} from "../../../queries/TaskQuery"

type Props = {
    task: Task
}

export const TaskItem: React.FC<Props> = ({task}) => {

    const updateDoneTasks = UseUpdateDoneTasks();

    return (
        <li className={task.is_done ? "done" : ""}>
            <label className="checkbox-label">
                <input
                type="checkbox"
                className="checkbox-input"
                onClick={() => updateDoneTasks.mutate(task)}/>
            </label>
            <div><span>{task.title}</span></div>
            <button className="btn is-delete">削除</button>
        </li>
    )
}
