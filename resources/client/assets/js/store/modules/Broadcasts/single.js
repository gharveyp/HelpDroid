function initialState() {
    return {
        item: {
            id: null,
            message: null,
            severity: null,
        },
        
        severityEnum: [ { value: 'LOW', label: 'LOW' }, { value: 'MEDIUM', label: 'MEDIUM' }, { value: 'HIGH', label: 'HIGH' }, ],
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    
    severityEnum: state => state.severityEnum,
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (! _.isEmpty(state.item.severity) && typeof state.item.severity === 'object') {
                params.set('severity', state.item.severity.value)
            }

            axios.post('/api/v1/broadcasts', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (! _.isEmpty(state.item.severity) && typeof state.item.severity === 'object') {
                params.set('severity', state.item.severity.value)
            }

            axios.post('/api/v1/broadcasts/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/broadcasts/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        
    },
    
    setMessage({ commit }, value) {
        commit('setMessage', value)
    },
    setSeverity({ commit }, value) {
        commit('setSeverity', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setMessage(state, value) {
        state.item.message = value
    },
    setSeverity(state, value) {
        state.item.severity = value
    },
    
    setSeverityEnum(state, value) {
        state.severityEnum = value
    },
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
