import api from './api';

const getRandom = () => api.get(`featured-game/random`);

export {    
    getRandom
}
