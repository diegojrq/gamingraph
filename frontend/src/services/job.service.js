import api from './api';

const getJobs = () => api.get(`job`);
const executeJob = (job) => api.post(`job/execute/${job}`);

export {    
    getJobs,
    executeJob
}
