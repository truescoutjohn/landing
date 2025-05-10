import User from "./User";


export default interface UserPagination {
    users: User[],
    current_page: number,
    next_page_url: string,
    last_page: number,
};